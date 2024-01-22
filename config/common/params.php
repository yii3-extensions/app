<?php

declare(strict_types=1);

use App\ApplicationParameters;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Definitions\Reference;
use Yiisoft\I18n\Locale;
use Yiisoft\Session\Flash\FlashInterface;

return [
    'app' => [
        'charset' => 'UTF-8',
        'locale' => 'en-US',
        'name' => 'My Project',
    ],

    'yiisoft/aliases' => [
        'aliases' => require __DIR__ . '/aliases.php',
    ],

    'yiisoft/translator' => [
        'locale' => 'en',
        'fallbackLocale' => 'en',
        'defaultCategory' => 'app',
        'categorySources' => [
            Reference::to('translation.app'),
        ],
    ],

    'yiisoft/view' => [
        'parameters' => [
            'app' => Reference::to(ApplicationParameters::class),
            'assetManager' => Reference::to(AssetManager::class),
            'csrfToken' => Reference::to(CsrfTokenInterface::class),
            'flash' => Reference::to(FlashInterface::class),
            'locale' => Reference::to(Locale::class),
        ],
    ],

    'yiisoft/yii-view' => [
        'layout' => '@resource/layout/main',
    ],
];
