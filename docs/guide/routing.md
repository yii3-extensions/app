# Routing

The [Yii Router](https://github.com/yiisoft/router) is the main entry point for the application.

It's responsible for matching the incoming request to a route and dispatching the request to the appropriate controller.

The following example shows how to create a configuration for the [Yii Router](https://github.com/yiisoft/router):

The configuration file is located at: `config/common/di/router.php`

```php
<?php

declare(strict_types=1);

use Yiisoft\Config\Config;
use Yiisoft\DataResponse\Middleware\FormatDataResponse;
use Yiisoft\Csrf\CsrfMiddleware;
use Yiisoft\Router\Group;
use Yiisoft\Router\RouteCollection;
use Yiisoft\Router\RouteCollectionInterface;
use Yiisoft\Router\RouteCollectorInterface;

/** @var Config $config */

return [
    RouteCollectionInterface::class => static function (RouteCollectorInterface $collector) use ($config) {
        $collector
            ->middleware(CsrfMiddleware::class)
            ->middleware(FormatDataResponse::class)
            ->addGroup(
                Group::create()
                    ->routes(...$config->get('routes'))
            );

        return new RouteCollection($collector);
    },
];
```

The `$config->get('routes')` statement is used to get the routes from the `routes` configuration file.

The `routes` configuration file is located in the `config/common` directory and has the following code:

```php
<?php

declare(strict_types=1);

use App\UseCase\Home\HomeAction;
use Yiisoft\Router\Group;
use Yiisoft\Router\Route;

return [
    Group::create('/{_language}')
        ->routes(
            Route::get('/')->action([HomeAction::class, 'run'])->name('home'),
        ),
];
```

| key               | Description                                                                                      |
|-------------------|---------------------------------------------------------------------------------------------------
| `Route::get('/')` | Statement creates a route that matches the `GET` request to the `/` path.                        |
| `action()`        | Method specifies the action that should be executed when the route is matched.                   |
| `name()`          | Method specifies the name of the route. The name of the route is used to generate URLs.          |
| `routes`          | Configuration file can contain many routes. The routes can be grouped into groups.               |

The following example shows how to create a group of routes.

```php
<?php

declare(strict_types=1);

use App\Controller\SiteController;

return [
    Group::create('/site')
        ->routes(
            Route::get('/contact')->action([SiteController::class, 'contact'])->name('site/contact'),
            Route::get('/about')->action([SiteController::class, 'about'])->name('site/about'),
        ),
];
```

The `Group::create('/site')` statement creates a group of routes that matches the `/site` path. The `routes()` method
specifies the routes that should be added to the group.

For more information about the [Yii Router](https://github.com/yiisoft/router).
