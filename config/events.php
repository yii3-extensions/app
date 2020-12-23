<?php

declare(strict_types=1);

use App\Event\EventMessageSent;
use App\Event\EventMessageNotSent;
use Yii\Extension\Service\Event\MessageSent;
use Yii\Extension\Service\Event\MessageNotSent;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    MessageSent::class => [[EventMessageSent::class, 'addFlash']],
    MessageNotSent::class => [[EventMessageNotSent::class, 'addFlash']],
    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
