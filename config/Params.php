<?php

declare(strict_types=1);

namespace Yii;

use Psr\Log\LogLevel;
use Yiisoft\Assets\AssetManager;

use function dirname;

final class Params
{
    public function getAliases(): array
    {
        return [
            '@root' => dirname(__DIR__),
            '@assets' => '@root/public/assets',
            '@assetsUrl' => '/assets',
            '@mail' => '@root/resources/mail',
            '@npm' => '@root/node_modules',
            '@resources' => '@root/resources',
            '@runtime' => '@root/runtime',
            '@vendor' => '@root/vendor',
            '@views' => '@root/resources/views',
            '@yiisoft/yii/db/migration' => '@vendor/yii-db-migration'
        ];
    }

    public function getApplicationConfig(): array
    {
        return [
            'app' => [
                'charset' => 'UTF-8',
                'emailFrom' => 'tester@example.com',
                'language' => 'en',
                'logo' => '/images/yii-logo.jpg',
                'mailer' => [
                    'from' => 'tester@example.com'
                ],
                'nav' => [
                    /**
                    * Example menu config simple link, dropdown menu.
                    *[
                    *   'label' => 'Home',
                    *   'url' => ['site/index']
                    *],
                    *[
                    *   'label' => 'Dropdown',
                    *   'items' => [
                    *       ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                    *       ['label' => 'Level 2 - Dropdown A', 'url' => '#'],
                    *       '<li class="dropdown-divider"></li>',
                    *       '<li style="color:black;list-style-type: none">Dropdown Header</li>',
                    *       ['label' => 'Level 3 - Dropdown B', 'url' => '#'],
                    *       ['label' => 'Level 4 - Dropdown A', 'url' => '#'],
                    *   ],
                    *],
                    */
                    'guest' => [
                        ['label' => 'About', 'url' => '/about'],
                        ['label' => 'Contact', 'url' => '/contact'],
                    ],
                    'logged' => [],
                ],
                'navBar' => [
                    'config' => [
                        'brandLabel()' => ['My Project'],
                        'brandImage()' => ['/images/yii-logo.jpg'],
                        'itemsOptions()' => [['class' => 'navbar-end']],
                        'options()' => [['class' => 'is-black', 'data-sticky' => '', 'data-sticky-shadow' => '']]
                    ],
                ],
                'name' => 'My Project',
            ],
        ];
    }

    public function getCachePath(): string
    {
        return dirname(__DIR__) . '/runtime/cache';
    }

    public function getComposerView(): string
    {
        return dirname(__DIR__) . '/resources/mail';
    }

    public function getSqliteDsn(): string
    {
        return 'sqlite:' . dirname(__DIR__) . '/Data/Runtime/yiitest.sq3';
    }

    public function getEventListeners(): array
    {
        return [];
    }

    public function getFileMailerStorage(): string
    {
        return dirname(__DIR__) . '/runtime/mail';
    }

    public function getFileRotatorMaxFiles(): int
    {
        return 5;
    }

    public function getFileRotatorMaxFileSize(): int
    {
        return 10;
    }

    public function getHtmlRendererConfig(): array
    {
        return [
            'default' => [
                'callStackItem',
                'error',
                'exception',
                'previousException'
            ]
        ];
    }

    public function getLogFile(): string
    {
        return dirname(__DIR__) . '/runtime/logs/app.log';
    }

    public function getLogLevels(): array
    {
        return [
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::WARNING,
            LogLevel::INFO,
            LogLevel::DEBUG
        ];
    }

    public function getViewDefaultParameters(): array
    {
        return [
            'assetManager' => AssetManager::class
        ];
    }
}
