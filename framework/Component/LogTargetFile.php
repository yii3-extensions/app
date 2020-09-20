<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Yii\Params;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Log\Target\File\FileTarget;
use Yiisoft\Log\Target\File\FileRotatorInterface;

final class LogTargetFile
{
    public function buildFileTargetConfig(ContainerInterface $container): FileTarget
    {
        $aliases = $container->get(Aliases::class);
        $params = new Params();

        $fileTarget = new FileTarget(
            $aliases->get($params->getLogFile()),
            $container->get(FileRotatorInterface::class)
        );

        $fileTarget->setLevels(
            $params->getLogLevels()
        );

        return $fileTarget;
    }
}
