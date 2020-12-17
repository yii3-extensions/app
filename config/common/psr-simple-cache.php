<?php

declare(strict_types=1);

use Psr\SimpleCache\CacheInterface as SimpleCacheInterface;
use Yiisoft\Cache\File\FileCache;

return [
    SimpleCacheInterface::class => FileCache::class,
];
