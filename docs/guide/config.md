# Yii config

Specifies the way to assemble the configuration for the [Yii Dependency Injection](https://github.com/yiisoft/di) 
container for the application.

## Config structure

```text
config
├── common                              Common configuration.
│    └── aliases                        Aliases configuration.
│    └── params                         Common parameters.
│    └── routes                         Routes for the application.
│    └── di                             Common configuration for dependency injection container.
│        └── application-parameter.php  Application parameters.
│        └── i18n.php                   Internationalization configuration.
│        └── logger.php                 Logger configuration.
│        └── router.php                 Router configuration.
│        └── translator.php             Translator configuration.
├── console                             Console configuration.
│    └── commands                       Commands configuration.
│    └── params                         Console parameters.
│    └── di                             Console configuration for dependency injection container.
│        └── translator-extractor.php   Translator extractor configuration.
├── environments                        Configuration for different environments.
│    └── dev                            Configuration for the dev environment.
│        └── params.php                 Parameters for the dev environment.
│    └── prod                           Configuration for the prod environment.
│        └── params.php                 Parameters for the prod environment.
│    └── test                           Configuration for the test environment.
│        └── params.php                 Parameters for the test environment.
├── web                                 Web configuration.
│    └── events                         Events configuration.
│    └── params                         Web parameters.
│    └── di                             Web configuration for dependency injection container.
│        └── application.php            Application configuration.
│        └── psr17.php                  PSR-17 HTTP Factory.    
```

For default application template, the configuration is located in the `config/` directory. The Yii packages are
configured under the following standard:

- di
- di-web
- di-console
- di-providers
- di-providers-web
- di-providers-console
- di-delegates
- di-delegates-web
- di-delegates-console
- di-tags
- di-tags-web
- di-tags-console

For the application, the configuration is divided in tree parts, `di`, `di-web` and `di-console`. The `di` part
is used for both web and console applications. The `di-web` part is used only for web applications. The `di-console`
part is used only for console applications.

Also you can configure the application for different environments. For example, you can configure the application for
the `dev`, `prod` and `tests` environment.

Example of configuration:

file: composer.json
```json
    "extra": {
        "config-plugin-file": "configuration.php"
    },
```

file: configuration.php
```php
<?php

declare(strict_types=1);

return [
    'config-plugin' => [
        'params' => 'common/params.php',
        'params-web' => [
            '$params',
            'web/params.php',
        ],
        'params-console' => [
            '$params',
            'console/params.php',
        ],
        'di' => 'common/di/*.php',
        'di-web' => [
            '$di',
            'web/di/*.php',
        ],
        'di-console' => [
            '$di',
            'console/di/*.php',
        ],
        'events' => [],
        'events-web' => [
            '$events',
            'web/events.php',
        ],
        'events-console' => '$events',
        'routes' => 'common/routes.php',
        'bootstrap' => [],
        'bootstrap-web' => '$bootstrap',
        'bootstrap-console' => '$bootstrap',
    ],
    'config-plugin-environments' => [
        'dev' => [
            'params' => [
                'environments/dev/params.php',
            ],
        ],
        'prod' => [
            'params' => [
                'environments/prod/params.php',
            ],
        ],
        'test' => [
            'params' => [
                'environments/test/params.php',
            ],
        ],
    ],
    'config-plugin-options' => [
        'source-directory' => 'config',
    ],
];
```
