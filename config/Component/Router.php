<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Yii\Routes;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Router\Group;
use Yiisoft\Router\Dispatcher;
use Yiisoft\Router\DispatcherInterface;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Router\FastRoute\UrlGenerator;
use Yiisoft\Router\FastRoute\UrlMatcher;

return [
    /** component router */
    DispatcherInterface::class => Dispatcher::class,

    RouteCollectorInterface::class => Group::create(),

    UrlGeneratorInterface::class => UrlGenerator::class,

    UrlMatcherInterface::class => static function (ContainerInterface $container) {
        $routes = new Routes();

        $collector = $container->get(RouteCollectorInterface::class);

        $collector->addGroup(
            Group::create(null, $routes->getRoutes())
                ->addMiddleware(FormatDataResponse::class)
        );

        return new UrlMatcher(new RouteCollection($collector));
    }
];
