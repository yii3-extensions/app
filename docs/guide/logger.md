# Logging 

The [Yii Logging Library](https://github.com/yiisoft/log) is used to log messages.

This package provides [PSR-3](https://www.php-fig.org/psr/psr-3/) compatible logging library.

It's a simple and flexible logging library that supports many log targets.

Each target may filter messages by their severity levels and categories and then export them to some medium such as
file, email or syslog.

The following example shows how to create configuration for the `LoggerInterface::class`:

The configuration file is located at: `config/di/logger.php`

```php
<?php

declare(strict_types=1);

use Psr\Log\LoggerInterface;
use Yiisoft\Definitions\ReferencesArray;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileTarget;

/** @var array $params */

return [
    LoggerInterface::class => [
        'class' => Logger::class,
        '__construct()' => [
            'targets' => ReferencesArray::from(
                [
                    FileTarget::class,
                ],
            ),
        ],
    ],
];
```

ReferencesArray is used to create a list of references to the log targets classes.

If we want to customize the log target file, we simply change the value of the parameters in the
[params.php](https://github.com/yii3-extensions/app/blob/main/config/common/params.php) file:

```php
<?php

declare(strict_types=1);

use Psr\Log\LogLevel;

return [
    // Log target file
    'yiisoft/log-target-file' => [
        'fileTarget' => [
            'file' => '@runtime/logs/app.log',
            'levels' => [
                LogLevel::EMERGENCY,
                LogLevel::ERROR,
                LogLevel::WARNING,
                LogLevel::INFO,
                LogLevel::DEBUG,
            ],
            'dirMode' => 0755,
            'fileMode' => null,
        ],
        'fileRotator' => [
            'maxFileSize' => 10240,
            'maxFiles' => 5,
            'fileMode' => null,
            'compressRotatedFiles' => false,
        ],
    ],    
];
```

The `yiisoft/log-target-file` array has the following keys:

| key        | Description                                                                                             |
|------------|---------------------------------------------------------------------------------------------------------|
| fileTarget | An array of file target. The key is the file target class, the value is the file target configuration.  |
| file       | The file path. For default, the file path is `@runtime/logs/app.log`.                                   |
| levels     | The message levels that this target is interested in. For default, the message levels are:              |
|            | `LogLevel::EMERGENCY`, `LogLevel::ERROR`, `LogLevel::WARNING`, `LogLevel::INFO`, `LogLevel::DEBUG`.     |
| dirMode    | The permission to be set for newly created directories. For default, the permission is `0755`.          |
| fileMode   | The permission to be set for newly created files. For default, the permission is `null`.                |
| fileRotator| An array of file rotator. The key is the file rotator class, the value is the file rotator              |
|            | configuration.                                                                                          |
| maxFileSize| The maximum size of log file in kilobytes. If the size of the log file exceeds this limit, a rotation   |
|            | will be performed. For default, the maximum size of log file is `10240`.                                |
| maxFiles   | The maximum number of log files that will be kept. For default, the maximum number of log files is `5`. |
| fileMode   | The permission to be set for newly created files. For default, the permission is `null`.                |
| compressRotatedFiles | Whether to compress rotated files using gzip. For default, the compression is `false`.        |
