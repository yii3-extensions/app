<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Yii\Routes;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Router\Group;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\FastRoute\UrlMatcher;

final class Router
{
    public function buildRoutesConfig(ContainerInterface $container): UrlMatcher
    {
        $routes = new Routes();

        $collector = $container->get(RouteCollectorInterface::class);

        $collector->addGroup(
            Group::create(null, $routes->getRoutes())
                ->addMiddleware(FormatDataResponse::class)
        );

        return new UrlMatcher(new RouteCollection($collector));
    }
}
