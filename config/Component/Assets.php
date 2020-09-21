<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Assets\AssetPublisherInterface;

return [
    /** component assets */
    AssetConverterInterface::class => static fn (ContainerInterface $container) => new AssetConverter(
        $container->get(Aliases::class),
        $container->get(LoggerInterface::class)
    ),

    AssetPublisherInterface::class => static fn (ContainerInterface $container) => new AssetPublisher(
        $container->get(Aliases::class)
    ),

    AssetManager::class => static function (ContainerInterface $container) {
        $assetManager = new AssetManager($container->get(LoggerInterface::class));
        $assetManager->setConverter($container->get(AssetConverterInterface::class));
        $assetManager->setPublisher($container->get(AssetPublisherInterface::class));

        return $assetManager;
    }
];
