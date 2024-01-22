# Many applications with `Subfolder::class` middleware

If you want to use subfolder middleware for URL routing, you need to adjust `config/web/params.php` file.

For our example, let's assume that web server root is pointing to the all-projects root.

There is `yii3` project with its `yii3/public` directory that should be accessed as `http://localhost/yii3/public`.

> Note: While being a common practice for local development, it's recommended to prefer separate hosts for separate
projects pointing directly to `public` directory.

Here's how `config/web/params.php` should be adjusted, add prefix to `app` config:

```php
'app' => [
    'prefix' => '/yii3/public',
],
```

Now defined config/common/subfolder.php will be used for URL routing.

```php
?php

declare(strict_types=1);

use Yiisoft\Aliases\Aliases;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Yii\Middleware\SubFolder;

return [
    SubFolder::class => static function (
        Aliases $aliases,
        UrlGeneratorInterface $urlGenerator
    ) use ($params) {
        $aliases->set('@baseUrl', $params['app']['prefix']);

        return new SubFolder(
            $urlGenerator,
            $aliases,
            $params['app']['prefix'] === '/' ? null : $params['app']['prefix'],
        );
    },
];
```

To test it in action run the following command:

```bash
php -S 127.0.0.1:8080 <all projects root path>
```

Now you can use `http://localhost:8080/yii3/public` to access the application.
