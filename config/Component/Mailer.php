<?php

declare(strict_types=1);

namespace Yii\Component;

use Swift_Transport;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Yii\Params;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Mailer\Composer;
use Yiisoft\Mailer\FileMailer;
use Yiisoft\Mailer\MailerInterface;
use Yiisoft\Mailer\MessageFactory;
use Yiisoft\Mailer\MessageFactoryInterface;
use Yiisoft\Mailer\SwiftMailer\Mailer;
use Yiisoft\Mailer\SwiftMailer\Message;
use Yiisoft\View\WebView;

$params = new Params();

return [
    /** component mailer */
    Composer::class => [
        '__class' => Composer::class,
        '__construct()' => [
            Reference::to(WebView::class),
            $params->getComposerView()
        ]
    ],

    MessageFactory::class => [
        '__class' => MessageFactory::class,
        '__construct()' => [
            Message::class
        ]
    ],

    MessageFactoryInterface::class => MessageFactory::class,

    FileMailer::class => [
        '__class' => FileMailer::class,
        '__construct()' => [
            'path' => $params->getFileMailerStorage()
        ]
    ],

    MailerInterface::class => FileMailer::class
];
