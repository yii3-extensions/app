<?php

declare(strict_types=1);

namespace Config\Common;

use Psr\Log\LogLevel;
use Psr\Log\LoggerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileRotator;
use Yiisoft\Log\Target\File\FileRotatorInterface;
use Yiisoft\Log\Target\File\FileTarget;

// Define the application file-rotator here.
$maxFileSize = 10240;
$maxFiles = 5;
$fileMode = null;
$rotateByCopy = null;
$compressRotatedFiles = false;

// Define the application file-target here.
$file =  dirname(__DIR__, 2) . '/runtime/logs/app.log';
$levels = [
    LogLevel::EMERGENCY,
    LogLevel::ERROR,
    LogLevel::WARNING,
    LogLevel::INFO,
    LogLevel::DEBUG,
];
$dirMode = 0755;
$fileMode = null;

return [
    FileRotatorInterface::class => [
        '__class' => FileRotator::class,
        '__construct()' => [
            $maxFileSize,
            $maxFiles,
            $fileMode,
            $rotateByCopy,
            $compressRotatedFiles,
        ],
    ],

    FileTarget::class => [
        '__class' => FileTarget::class,
        '__construct()' => [
            $file,
            Reference::to(FileRotatorInterface::class),
            $dirMode,
            $fileMode,
        ],
        'setLevels()' => [$levels]
    ],

    LoggerInterface::class => [
        '__class' => Logger::class,
        '__construct()' => [
            ['file' => Reference::to(FileTarget::class)]
        ],
    ],
];
