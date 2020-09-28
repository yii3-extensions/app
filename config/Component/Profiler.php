<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Log\LoggerInterface;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Profiler\Profiler;

return [
    /** component profiler */
    Profiler::class => [
        '__class' => Profiler::class,
        '__construct()' => [
            Reference::to(LoggerInterface::class)
        ]
    ]
];
