<?php

declare(strict_types=1);

use App\Command\Hello;
use Yii\Extension\Service\ServiceParameter;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\I18n\Locale;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Translator\Translator;

return [
    'app' => [
        'charset' => 'UTF-8',
        'locale' => 'en',
        'logo' => '/images/yii-logo.jpg',

        /** config widget nav */
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
            'guest' => [],
            'logged' => [],
        ],

        /** config widget navBar */
        'navBar' => [
            'config' => [
                'brandLabel()' => ['My Project'],
                'brandImage()' => ['/images/yii-logo.jpg'],
                'itemsOptions()' => [['class' => 'navbar-end']],
                'options()' => [['class' => 'is-black', 'data-sticky' => '', 'data-sticky-shadow' => '']]                    ],
        ],

        'name' => 'My Project',
    ],

    'yii-extension/view-services' => [
        'parameters' => [
            'csrfToken' => Reference::to(CsrfTokenInterface::class),
            'locale' => Reference::to(Locale::class),
            'serviceParameter' => Reference::to(ServiceParameter::class),
            'translator' => Reference::to(translator::class),
        ],
        'layoutFile' => '@storage/layout/main',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => dirname(__DIR__),
            '@assets' => '@root/public/assets',
            '@assetsUrl' => '/assets',
            '@npm' => '@root/node_modules',
            '@storage' => '@root/storage',
            '@runtime' => '@root/runtime',
            '@vendor' => '@root/vendor',
            '@layout' => '@storage/views/layout',
            '@views' => '@storage/views',
        ],
    ],

    'yiisoft/log-target-file' => [
        'fileTarget' => [
            'file' => '@runtime/logs/app.txt',
        ],
    ],

    'yiisoft/translator' => [
        'path' => '@storage/locale',
        'defaultCategoryName' => 'app',
        'locale' => 'en',
        'fallbackLocale' => 'es',
    ],

    'yiisoft/view' => [
        'defaultParameters' => [
            'assetManager' => Reference::to(AssetManager::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'urlMatcher' => Reference::to(UrlMatcherInterface::class),
        ],
        'basePath' => '@views',
    ],

    'yiisoft/yii-console' => [
        'commands' => [
            'hello' => Hello::class,
        ],
    ],

    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
