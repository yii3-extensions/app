# Application

The [Yii HTTP Application](https://github.com/yiisoft/yii-http) provides the `Application::class`, as well as the events
and handlers needed to interact with HTTP.

The package is implemented using [PSR-7](https://www.php-fig.org/psr/psr-7/) and [PSR-15](https://www.php-fig.org/psr/psr-15/)
standards.

The following example shows how to create configuration for the application, using a [Yii HTTP Application](https://github.com/yiisoft/yii-http)
package.

The configuration file is located at: `config/web/di/application.php`

```php
<?php

declare(strict_types=1);

use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Definitions\Reference;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Yii\Http\Handler\NotFoundHandler;

/** @var array $params */

return [
    \Yiisoft\Yii\Http\Application::class => [
        '__construct()' => [
            'dispatcher' => DynamicReference::to(static function (Injector $injector) use ($params) {
                return $injector->make(MiddlewareDispatcher::class)
                    ->withMiddlewares($params['middlewares']);
            }),
            // Customize error page handling
            'fallbackHandler' => Reference::to(NotFoundHandler::class),
        ],
    ],
    \Yiisoft\Yii\Middleware\Locale::class => [
        '__construct()' => [
            'supportedLocales' => $params['locale']['locales'],
            'ignoredRequestUrlPatterns' => $params['locale']['ignoredRequests'],
        ],
    ],
];
```

- `Application::class` is a [PSR-15](https://www.php-fig.org/psr/psr-15/) middleware. It's used to dispatch the
middleware stack and handle the request.
- The `params` group contains the `yiisoft-yii-http.php` parameters.
- The [params](https://github.com/yii3-extensions/app/blob/main/config/web/params.php) parameter is used to configure
the middleware stack. 

```php
<?php

declare(strict_types=1);

use Yii\Middleware\Locale;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Session\SessionMiddleware;

return [
    // list of Middleware class names that should be applied to each request.
    'middlewares' => [
        ErrorCatcher::class,
        SessionMiddleware::class,
        Locale::class,
        Router::class,
    ],

    // Locale middleware configuration
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
```
