<?php

declare(strict_types=1);

namespace Yii\Component;

use Yii\Params;
use Yiisoft\Cache\Cache;
use Yiisoft\Cache\CacheInterface;
use Yiisoft\Cache\File\FileCache;
use Yiisoft\Factory\Definitions\Reference;

$params = new Params();

return [
    /** component cache */
    FileCache::class => [
        '__class' => FileCache::class,
        '__construct()' => [
            $params->getCachePath()
        ]
    ],

    CacheInterface::class => [
        '__class' => Cache::class,
        '__construct()' => [
            Reference::to(FileCache::class)
        ]
    ]
];
