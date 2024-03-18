<?php

declare(strict_types=1);

namespace App;

use UIAwesome\Html\{Component\Item, Interop\RenderInterface, Textual\A, Textual\Span};
use Yiisoft\{Aliases\Aliases, Router\CurrentRoute, Router\UrlGeneratorInterface, Translator\TranslatorInterface};

final class ApplicationParameters
{
    public function __construct(
        public readonly Aliases $aliases,
        public readonly CurrentRoute $currentRoute,
        public readonly TranslatorInterface $translator,
        public readonly UrlGeneratorInterface $urlGenerator,
        public readonly string $charset = 'UTF-8',
        public readonly string $brandImage = 'https://raw.githubusercontent.com/yii-tools/.github/8d7f27c348cd168fdbc896884faf70fae11b770f/images/yii_framework_logo.svg',
        public readonly string $brandLink = 'https://www.yiiframework.com/',
        public readonly string $copyright = 'YiiFramework™.',
        public readonly string $description = 'Application Web for Flowbite',
        public readonly string $name = 'Web Application',
        public readonly array $languages = [],
        public readonly array $locales = [],
    ) {}

    public function credits(): RenderInterface
    {
        $definitions = [
            'class()' => ['font-medium font-extrabold text-center text-black dark:text-white'],
        ];

        return A::widget()
            ->content(
                Span::widget($definitions)->content($this->copyright),
                Span::widget($definitions)
                    ->content(' ' . $this->name . ' - ' . date('Y') . '.')
            )
            ->href($this->brandLink)
            ->title('Yii Framework');
    }

    /**
     * @psalm-return Item[]
     */
    public function itemsMenu(): array
    {
        $arguments = [];

        if ($this->translator->getLocale() === 'en') {
            $arguments = ['_language' => 'en'];
        }

        return [
            Item::widget()->label($this->t('site.menu.home'))->link($this->urlGenerator->generate('home', $arguments)),
        ];
    }

    public function t(string $message, array $parameters = [], string $category = 'app'): string
    {
        return $this->translator->translate($message, $parameters, $category);
    }
}
