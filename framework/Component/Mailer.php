<?php

declare(strict_types=1);

namespace Yii\Component;

use Swift_Transport;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Yii\Params;
use Yiisoft\Aliases\Aliases;
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
    Composer::class => static fn (ContainerInterface $container) => new Composer(
        $container->get(WebView::class),
        $container->get(Aliases::class)->get($params->getComposerView())
    ),

    MessageFactory::class => static fn () => new MessageFactory(Message::class),
    MessageFactoryInterface::class => MessageFactory::class,

    Mailer::class => static fn (ContainerInterface $container) => new Mailer(
        $container->get(MessageFactoryInterface::class),
        $container->get(Composer::class),
        $container->get(EventDispatcherInterface::class),
        $container->get(LoggerInterface::class),
        $container->get(Swift_Transport::class)
    ),

    FileMailer::class => static fn (ContainerInterface $container) => new FileMailer(
        $container->get(MessageFactoryInterface::class),
        $container->get(Composer::class),
        $container->get(EventDispatcherInterface::class),
        $container->get(LoggerInterface::class),
        $container->get(Aliases::class)->get($params->getFileMailerStorage())
    ),

    MailerInterface::class => static fn (ContainerInterface $container) => $container->get(FileMailer::class)
];
