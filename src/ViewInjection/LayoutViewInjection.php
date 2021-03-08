<?php

declare(strict_types=1);

namespace App\ViewInjection;

use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\LayoutParametersInjectionInterface;

final class LayoutViewInjection implements LayoutParametersInjectionInterface
{
    private Aliases $aliases;
    private AssetManager $assetManager;
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;
    private UrlMatcherInterface $urlMatcher;

    public function __construct(
        Aliases $aliases,
        AssetManager $assetManager,
        UrlGeneratorInterface $urlGenerator,
        UrlMatcherInterface $urlMatcher,
        TranslatorInterface $translator
    ) {
        $this->aliases = $aliases;
        $this->assetManager = $assetManager;
        $this->urlGenerator = $urlGenerator;
        $this->urlMatcher = $urlMatcher;
        $this->translator = $translator;
    }

    public function getLayoutParameters(): array
    {
        return [
            'aliases' => $this->aliases,
            'assetManager' => $this->assetManager,
            'urlGenerator' => $this->urlGenerator,
            'urlMatcher' => $this->urlMatcher,
            'translator' => $this->translator,
        ];
    }
}
