<?php

declare(strict_types=1);

use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Middleware\Locale;

return [
    'middlewares' => [
        ErrorCatcher::class,
        SessionMiddleware::class,
        Locale::class,
        Router::class,
    ],

    'locale' => [
        'locales' => [
            'de' => 'de-DE',
            'en' => 'en-US',
            'es' => 'es-ES',
            'fr' => 'fr-FR',
            'pt' => 'pt-BR',
            'ru' => 'ru-RU',
            'zh' => 'zh-CN',
        ],
        'ignoredRequests' => [
            '/debug**',
        ],
    ],
];
