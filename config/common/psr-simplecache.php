<?php

declare(strict_types=1);

use Psr\SimpleCache\CacheInterface as SimpleCacheInterface;
use Yiisoft\Cache\CacheInterface;

return [
    SimpleCacheInterface::class => CacheInterface::class,
];
