<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Yii\Params;
use Yiisoft\Csrf\CsrfMiddleware;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Yii\Web\MiddlewareDispatcher;
use Yiisoft\Yii\Web\ErrorHandler\ErrorCatcher;
use Yiisoft\Yii\Web\ErrorHandler\HtmlRenderer;
use Yiisoft\Yii\Web\ErrorHandler\ThrowableRendererInterface;

$params = new Params();

return [
    /** component middleware dispatcher - error exception yii-web */
    MiddlewareDispatcher::class => static fn (ContainerInterface $container) => (new MiddlewareDispatcher($container))
        ->addMiddleware($container->get(Router::class))
        ->addMiddleware($container->get(SessionMiddleware::class))
        ->addMiddleware($container->get(CsrfMiddleware::class))
        ->addMiddleware($container->get(ErrorCatcher::class)),

    ThrowableRendererInterface::class => HtmlRenderer::class,

    HtmlRenderer::class => [
        '__class' => HtmlRenderer::class,
        '__construct()' => [$params->getHtmlRendererConfig()]
    ],
];
