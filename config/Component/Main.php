<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;

return [
    ContainerInterface::class => static fn (ContainerInterface $container) => $container,

    /** component events */
    Provider::class => static fn (ContainerInterface $container) => (
        new EventDispatcher()
    )->buildConfig($container),
    ListenerProviderInterface::class => Provider::class,
    EventDispatcherInterface::class => Dispatcher::class,
];
