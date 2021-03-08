<?php

declare(strict_types=1);

namespace Config\Common;

use App\Action\Index;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\RouteCollectionInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Router\FastRoute\UrlGenerator;
use Yiisoft\Router\FastRoute\UrlMatcher;

// Define the application routes here.
$routes = [
    Route::get('/', [Index::class, 'run'])->name('site/index'),
];

return [
    UrlMatcherInterface::class => UrlMatcher::class,
    UrlGeneratorInterface::class => UrlGenerator::class,
    RouteCollectorInterface::class => Group::create(),
    RouteCollectionInterface::class => static function (RouteCollectorInterface $collector) use ($routes) {
        $collector->addGroup(
            Group::create(null, $routes)->addMiddleware(FormatDataResponse::class)
        );

        return new RouteCollection($collector);
    }
];
