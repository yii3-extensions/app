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

final class Assets
{
    public function buildAssetConverterInterfaceConfig(ContainerInterface $container): AssetConverter
    {
        return new AssetConverter($container->get(Aliases::class), $container->get(LoggerInterface::class));
    }

    public function buildAssetPublisherInterfaceConfig(ContainerInterface $container): AssetPublisher
    {
        return new AssetPublisher($container->get(Aliases::class));
    }

    public function buildAssetManagerConfig(ContainerInterface $container): AssetManager
    {
        $assetManager = new AssetManager($container->get(LoggerInterface::class));

        $assetManager->setConverter($container->get(AssetConverterInterface::class));
        $assetManager->setPublisher($container->get(AssetPublisherInterface::class));

        return $assetManager;
    }
}
