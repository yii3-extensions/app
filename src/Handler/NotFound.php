<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Yiisoft\Http\Status;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class NotFound implements RequestHandlerInterface
{
    private TranslatorInterface $translator;
    private UrlGeneratorInterface $urlGenerator;
    private UrlMatcherInterface $urlMatcher;
    private ViewRenderer $viewRenderer;

    public function __construct(
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        UrlMatcherInterface $urlMatcher,
        ViewRenderer $viewRenderer
    ) {
        $this->translator = $translator;
        $this->urlGenerator = $urlGenerator;
        $this->urlMatcher = $urlMatcher;
        $this->viewRenderer = $viewRenderer->withControllerName('site');
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->render(
                '404',
                [
                    'urlGenerator' => $this->urlGenerator,
                    'urlMatcher' => $this->urlMatcher,
                    'translator' => $this->translator,
                ],
            )
            ->withStatus(Status::NOT_FOUND);
    }
}
