<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;

return [
    /** component di-container */
    ContainerInterface::class => static fn (ContainerInterface $container) => $container
];
