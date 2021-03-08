<?php

declare(strict_types=1);

namespace Config\Common;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;

return [
    ListenerProviderInterface::class => Provider::class,
    EventDispatcherInterface::class => Dispatcher::class,
];
