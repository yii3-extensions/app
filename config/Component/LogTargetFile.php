<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Yii\Params;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileRotator;
use Yiisoft\Log\Target\File\FileRotatorInterface;
use Yiisoft\Log\Target\File\FileTarget;

$params = new Params();

return [
    /** component logger - target file */
    FileRotatorInterface::class => fn () => new FileRotator(
        $params->getFileRotatorMaxFileSize(),
        $params->getFileRotatorMaxFiles(),
        null,
        null
    ),

    FileTarget::class => static function (ContainerInterface $container) use ($params) {
        $aliases = $container->get(Aliases::class);

        $fileTarget = new FileTarget(
            $aliases->get($params->getLogFile()),
            $container->get(FileRotatorInterface::class)
        );

        $fileTarget->setLevels(
            $params->getLogLevels()
        );

        return $fileTarget;
    },

    LoggerInterface::class => static fn (ContainerInterface $container) => new Logger(
        ['file' => $container->get(FileTarget::class)]
    )
];
