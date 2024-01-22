# Container delegates

Each delegate is a callable returning a container instance that's used in case a service can not be found in a primary
container. 

Delegates are defined in `config/delegates.php` file. This file is executed before the application is started. 

Also, you can also define it only for a specific part of the application, for example `console` or `web`, in 
`config/delegates-console.php` and `config/delegates-web.php` respectively.

The following example shows how to define the delegates:

```php
<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Yiisoft\Yii\Cycle\Factory\RepositoryContainer;

return [
    static function (ContainerInterface $container): ContainerInterface {
        return new RepositoryContainer($container);
    },
];
```

The delegates are defined as an array of callables. Each callable receives the container as a parameter. The container
is used to get the services that are needed to initialize the application.

The delegates are executed in the order in which the callables are defined in the array.

Example of [Yii Config](https://github.com/yiisoft/config) usage in `composer.json`:

```json
{
    "extra": {
        "config-plugin": {
            "delegates": "delegates.php",
            "delegates-console": [
                "$delegates",
                "delegates-console.php"
            ],
            "delegates-web": [
                "$delegates",
                "delegates-web.php"
            ]
        }
    }
}
