<?php

declare(strict_types=1);

namespace Config\Common;

use Yiisoft\Cache\Cache;
use Yiisoft\Cache\CacheInterface;
use Yiisoft\Cache\File\FileCache;
use Yiisoft\Factory\Definitions\Reference;

// Define the application cache path here.
$cachePath =  dirname(__DIR__, 2) . '/runtime/cache';

return [
    FileCache::class => [
        '__class' => FileCache::class,
        '__construct()' => [
            $cachePath,
        ]
    ],

    CacheInterface::class => [
        '__class' => Cache::class,
        '__construct()' => [
            Reference::to(FileCache::class)
        ]
    ]
];
