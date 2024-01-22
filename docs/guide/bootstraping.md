# Bootstrapping

The bootstrapping process is the first step of the application.

It's the first thing that's executed when the application is started. 

It's the place where you can initialize the application, load the configuration, load the routes, etc.

The bootstrapping process is defined in the `config/bootstrap.php` file. 

This file is executed before the application is started. 

Also, you can also define it only for a specific part of the application, for example `console` or `web`,
in `config\bootstrap-console.php` and `config\bootstrap-web.php` respectively.


The following example shows how to define the bootstrapping process:

```php
<?php

declare(strict_types=1);

return [
    function (Psr\Container\ContainerInterface $container) {
        $urlGenerator = $container->get(\Yiisoft\Router\UrlGeneratorInterface::class);
        $urlGenerator->setUriPrefix($_ENV['BASE_URL']);
    },
];
```

The bootstrapping process is defined as an array of callables. Each callable receives the container as a parameter.

The container is used to get the services that are needed to initialize the application.

The bootstrapping process is executed in the order in which the callables are defined in the array.
