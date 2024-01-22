<?php

declare(strict_types=1);

namespace App;

use PHPForge\Component\Dropdown;
use PHPForge\Component\Item;
use PHPForge\Html\A;
use PHPForge\Html\Button;
use PHPForge\Html\ButtonToggle;
use PHPForge\Html\Img;
use PHPForge\Html\Span;
use PHPForge\Html\Svg;
use PHPForge\Widget\ElementInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

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
        public readonly string $name = 'Web Application'
    ) {
    }

    public function getCredits(): ElementInterface
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

    public function getIconGithub(): ElementInterface
    {
        return A::widget($this->getLinkIconDefinitions())
            ->class('md:block hidden')
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/brands/github.svg'))
            )
            ->href('https://github.com/yiisoft')
            ->title('GitHub');
    }

    public function getIconSlack(): ElementInterface
    {
        return A::widget($this->getLinkIconDefinitions())
            ->class('md:block hidden')
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/brands/slack.svg'))
            )
            ->href(
                'https://join.slack.com/t/yii/shared_invite/enQtMzQ4MDExMDcyNTk2LTc0NDQ2ZTZhNjkzZDgwYjE4YjZlNGQxZjFmZDBjZTU3NjViMDE4ZTMxNDRkZjVlNmM1ZTA1ODVmZGUwY2U3NDA'
            )
            ->title('Slack');
    }

    public function getIconFacebook(): ElementInterface
    {
        return A::widget($this->getLinkIconDefinitions())
            ->class('md:block hidden')
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/brands/facebook.svg'))
            )
            ->href('https://www.facebook.com/groups/yiitalk/')
            ->title('Facebook');
    }

    public function getIconTwitter(): ElementInterface
    {
        return A::widget($this->getLinkIconDefinitions())
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/brands/twitter.svg'))
            )
            ->href('https://twitter.com/yiiframework')
            ->title('Twitter');
    }

    public function getIconTelegram(): ElementInterface
    {
        return A::widget($this->getLinkIconDefinitions())
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/brands/telegram.svg'))
            )
            ->href('https://t.me/yii3ru')
            ->title('Telegram');
    }

    public function getLanguageLabels(): string
    {
        $languageLabels = [
            'de-DE' => 'German',
            'en-US' => 'English',
            'es-ES' => 'Spanish',
            'fr-FR' => 'French',
            'pt-BR' => 'Portuguese',
            'ru-RU' => 'Russian',
            'zh-CN' => 'Chinese',
        ];

        return $languageLabels[$this->translator->getLocale()] ?? 'English';
    }

    public function getMenuDefinitions(): array
    {
        return [
            'activeClass()' => ['block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500', true],
            'containerClass()' => ['hidden w-full md:block md:w-auto'],
            'listClass()' => ['font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700'],
            'linkClass()' => ['block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent'],
            'toggleButton()' => [$this->menuToggle()],
        ];
    }

    public function getNavBarDefinitions(): array
    {
        return [
            'brandImage()' => [
                Img::widget()->alt($this->copyright)->class('h-6 mr-3 sm:h-9')->src($this->brandImage)->width(200),
            ],
            'brandLink()' => [$this->brandLink],
            'brandLinkClass()' => ['flex items-center'],
            'class()' => ['bg-white border-gray-200 dark:bg-gray-900'],
            'containerMenuClass()' => ['max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4'],
        ];
    }

    public function getSelectorLanguage(): ElementInterface
    {
        return Dropdown::widget()
            ->containerMenuClass('z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700')
            ->id('selector-language')
            ->items(
                Item::create()
                    ->iconClass('fi fi-de fis me-2')
                    ->label($this->t('site.selector-language.german'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'de',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'de-DE' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-us fis me-2')
                    ->label($this->t('site.selector-language.english'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'en',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'en' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-es fis me-2')
                    ->label($this->t('site.selector-language.spanish'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'es',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'es-ES' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-fr fis me-2')
                    ->label($this->t('site.selector-language.french'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'fr',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'fr-FR' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-br fis me-2')
                    ->label($this->t('site.selector-language.portuguese'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'pt',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'pt-BR' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-ru fis me-2')
                    ->label($this->t('site.selector-language.russian'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'ru',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'ru-RU' ? $this->getActiveClassDropdown() : ''),
                Item::create()
                    ->iconClass('fi fi-cn fis me-2')
                    ->label($this->t('site.selector-language.chinese'))
                    ->link($this->urlGenerator->generateFromCurrent([
                        '_language' => 'zh',
                    ]))
                    ->linkClass($this->translator->getLocale() === 'zh-CN' ? $this->getActiveClassDropdown() : ''),
            )
            ->linkClass('block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white')
            ->listclass('py-2 text-sm text-gray-700 dark:text-gray-200')
            ->toggleButton($this->dropdownToggle());
    }

    public function getToggleTheme(): ElementInterface
    {
        return Button::widget()
            ->class('text-gray-700 hover:text-gray-900 dark:hover:text-white dark:text-gray-400')
            ->content(
                Svg::widget($this->getSvgDefinitions())
                    ->class('hidden')
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/solid/moon.svg'))
                    ->id('theme-toggle-dark-icon'),
                Svg::widget($this->getSvgDefinitions())
                    ->class('hidden')
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/solid/sun.svg'))
                    ->id('theme-toggle-light-icon'),
            )
            ->id('theme-toggle')
            ->title('Click to change the theme');
    }

    /**
     * @psalm-return Item[]
     */
    public function itemsMenu(): array
    {
        $arguments = [];

        if ($this->translator->getLocale() === 'en') {
            $arguments = [
                '_language' => 'en',
            ];
        }

        return [
            Item::create()
                ->label($this->t('site.menu.home'))
                ->link($this->urlGenerator->generate('home', $arguments)),
        ];
    }

    public function t(string $message, array $parameters = [], string $category = 'app'): string
    {
        return $this->translator->translate($message, $parameters, $category);
    }

    private function getActiveClassDropdown(): string
    {
        return 'bg-blue-500 text-white block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white';
    }

    private function dropdownToggle(): ElementInterface
    {
        return ButtonToggle::widget()
            ->class(
                'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'
            )
            ->dataDropdownToggle(true)
            ->id('selector-language-toggle')
            ->toggleContent(
                Svg::widget($this->getSvgDefinitions())
                    ->filePath($this->aliases->get('@fontawesome-free/svgs/solid/globe.svg'))
                    ->height(20)
            )
            ->toggleId('selector-language');
    }

    private function menuToggle(): ElementInterface
    {
        return ButtonToggle::widget()
            ->ariaExpanded('false')
            ->class('inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600')
            ->dataCollapseToggle('navbar-default')
            ->icon(true)
            ->iconFilePath($this->aliases->get('@fontawesome-free/svgs/solid/bars.svg'))
            ->iconTag('svg')
            ->id(null)
            ->toggleClass('sr-only')
            ->toggleContent('Open main menu');
    }

    private function getLinkIconDefinitions(): array
    {
        return [
            'class()' => ['text-gray-700 hover:text-gray-900 dark:hover:text-white dark:text-gray-400'],
            'rel()' => ['noopener'],
            'target()' => ['_blank'],
        ];
    }

    private function getSvgDefinitions(): array
    {
        return [
            'fill()' => ['currentColor'],
            'height()' => ['32'],
        ];
    }
}
