<?php

declare(strict_types=1);

namespace Config\Web;

use Yiisoft\Assets\AssetConverter;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Assets\AssetPublisher;
use Yiisoft\Assets\AssetPublisherInterface;
use Yiisoft\Factory\Definitions\Reference;

return [
    AssetConverterInterface::class  => AssetConverter::class,
    AssetPublisherInterface::class => AssetPublisher::class,
    AssetManager::class => [
        '__class' => AssetManager::class,
        'setConverter()' => [Reference::to(AssetConverterInterface::class)],
        'setPublisher()' => [Reference::to(AssetPublisherInterface::class)]
    ]
];
