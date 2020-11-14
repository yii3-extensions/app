<?php

declare(strict_types=1);

use Yii\Routes;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Router\Group;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\RouteCollectionInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Router\FastRoute\UrlGenerator;
use Yiisoft\Router\FastRoute\UrlMatcher;

/** @var array $params */

return [
    UrlMatcherInterface::class => UrlMatcher::class,

    UrlGeneratorInterface::class => UrlGenerator::class,

    RouteCollectorInterface::class => Group::create(),

    RouteCollectionInterface::class => static function (RouteCollectorInterface $collector) {
        $routes = new Routes();

        $collector->addGroup(
            Group::create(null, $routes->getRoutes())->addMiddleware(FormatDataResponse::class)
        );

        return new RouteCollection($collector);
    }
];
