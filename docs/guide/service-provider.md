# Service provider

A service provider is a special class that's responsible for providing complex services or groups of dependencies for
the container and extensions of existing services.

A provider should extend from `Yiisoft\Di\ServiceProviderInterface::class` and must contain a `getDefinitions()` and 
`getExtensions()` methods. 

It should only give services for the container and therefore should only contain code that's related to this task.

It should never implement any business logic or other functionality such as environment bootstrap or applying changes to
a database.

In the application are defined in the file `config\providers.php` which is available throughout the application, you can
also define it only for a specific part of the application, for example `console` or `web`, in `config\providers-console.php`
and `config\providers-web.php` respectively.

The following example shows how to define a service provider in `config\providers.php` file:

```php
<?php

declare(strict_types=1);

return [
    'yiisoft/yii-debug/Debugger' => ProxyServiceProvider::class,
];
```

Example of MyProvider:

```php
<?php

declare(strict_types=1);

namespace Yiisoft\Yii\Debug;

use Psr\Container\ContainerInterface;
use Yiisoft\Di\ServiceProviderInterface;
use Yiisoft\Yii\Debug\Collector\ContainerInterfaceProxy;
use Yiisoft\Yii\Debug\Collector\ContainerProxyConfig;

final class ProxyServiceProvider implements ServiceProviderInterface
{
    /**
     * @psalm-suppress InaccessibleMethod
     */
    public function getDefinitions(): array
    {
        return [
            ContainerInterface::class => static fn (ContainerInterface $container) => new ContainerInterfaceProxy(
                $container,
                $container->get(ContainerProxyConfig::class),
            ),
        ];
    }

    public function getExtensions(): array
    {
        return [];
    }
}
```

The service provider is defined as an array of callables. Each callable receives the container as a parameter. 
The container is used to get the services that are needed to initialize the application.

The service providers are executed in the order in which the callables are defined in the array.

Example of [Yii Config](https://github.com/yiisoft/config) usage in `composer.json`:

```json
{
    "extra": {
        "config-plugin": {
            "providers": "providers.php",
            "providers-console": [
                "$providers",
                "providers-console.php"
            ],            
            "providers-web": [
                "$providers",
                "providers-web.php"
            ]
        }
    }
}
