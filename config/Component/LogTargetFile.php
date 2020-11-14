<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Log\LoggerInterface;
use Yii\Params;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileRotator;
use Yiisoft\Log\Target\File\FileRotatorInterface;
use Yiisoft\Log\Target\File\FileTarget;

$params = new Params();

return [
    /** component logger - target file */
    FileRotatorInterface::class => [
        '__class' => FileRotator::class,
        '__construct()' => [
            'maxFileSize' => $params->getFileRotatorMaxFileSize(),
            'maxFiles' => $params->getFileRotatorMaxFiles()
        ]
    ],

    FileTarget::class => [
        '__class' => FileTarget::class,
        '__construct()' => [
            'logFile' => $params->getLogFile(),
        ],
        'setLevels()' => [$params->getLogLevels()]
    ],

    LoggerInterface::class => [
        '__class' => Logger::class,
        '__construct()' => [
            ['file' => Reference::to(FileTarget::class)]
        ],
    ],
];
