<?php

declare(strict_types=1);

use App\Handler\NotFound;
use Yiisoft\ErrorHandler\ErrorCatcher;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Injector\Injector;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\Application;

return [
    Application::class => [
        '__construct()' => [
            'dispatcher' => static function (Injector $injector) {
                return ($injector->make(MiddlewareDispatcher::class))
                    ->withMiddlewares(
                        [
                            Router::class,
                            SessionMiddleware::class,
                            ErrorCatcher::class,
                        ]
                    );
            },
            'fallbackHandler' => Reference::to(NotFound::class),
        ],
    ],
];
