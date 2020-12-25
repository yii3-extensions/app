<?php

declare(strict_types=1);

use App\Event\MessageSentHandler;
use App\Event\MessageNotSentHandler;
use Yii\Extension\Service\Event\MessageSent;
use Yii\Extension\Service\Event\MessageNotSent;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    MessageSent::class => [[MessageSentHandler::class, 'addFlash']],
    MessageNotSent::class => [[MessageNotSentHandler::class, 'addFlash']],
    ReverseBlockMerge::class => new ReverseBlockMerge(),
];
