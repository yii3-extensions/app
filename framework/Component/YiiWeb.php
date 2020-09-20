<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Yiisoft\Csrf\CsrfMiddleware;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\MiddlewareDispatcher;
use Yiisoft\Yii\Web\ErrorHandler\ErrorCatcher;

final class YiiWeb
{
    public function buildMiddlewareDispatcherConfig(ContainerInterface $container): MiddlewareDispatcher
    {
        return (new MiddlewareDispatcher($container))
            ->addMiddleware($container->get(Router::class))
            ->addMiddleware($container->get(SessionMiddleware::class))
            ->addMiddleware($container->get(CsrfMiddleware::class))
            ->addMiddleware($container->get(ErrorCatcher::class));
    }
}
