<?php

declare(strict_types=1);

namespace Yii\Component;

use Swift_Transport;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;
use Psr\Log\LoggerInterface;
use Yii\Params;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetConverterInterface;
use Yiisoft\Assets\AssetPublisherInterface;
use Yiisoft\Assets\AssetManager;
use Yiisoft\EventDispatcher\Provider\Provider;
use Yiisoft\EventDispatcher\Dispatcher\Dispatcher;
use Yiisoft\Log\Logger;
use Yiisoft\Log\Target\File\FileRotator;
use Yiisoft\Log\Target\File\FileRotatorInterface;
use Yiisoft\Log\Target\File\FileTarget;
use Yiisoft\Mailer\Composer;
use Yiisoft\Mailer\FileMailer;
use Yiisoft\Mailer\MailerInterface;
use Yiisoft\Mailer\MessageFactory;
use Yiisoft\Mailer\MessageFactoryInterface;
use Yiisoft\Mailer\SwiftMailer\Mailer;
use Yiisoft\Mailer\SwiftMailer\Message;
use Yiisoft\Router\Group;
use Yiisoft\Router\Dispatcher as RouterDispatcher;
use Yiisoft\Router\DispatcherInterface;
use Yiisoft\Router\RouteCollectorInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Router\FastRoute\UrlGenerator;
use Yiisoft\Validator\ValidatorFactory;
use Yiisoft\Validator\ValidatorFactoryInterface;
use Yiisoft\View\WebView;
use Yiisoft\Yii\Web\MiddlewareDispatcher;
use Yiisoft\Yii\Web\ErrorHandler\HtmlRenderer;
use Yiisoft\Yii\Web\ErrorHandler\ThrowableRendererInterface;

$params = new Params();

return [
    ContainerInterface::class => static fn (ContainerInterface $container) => $container,

    /** component middleware dispatcher - error exception yii-web */
    MiddlewareDispatcher::class => static fn (ContainerInterface $container) => (
        new YiiWeb()
    )->buildMiddlewareDispatcherConfig($container),
    ThrowableRendererInterface::class => HtmlRenderer::class,
    HtmlRenderer::class => [
        '__class' => HtmlRenderer::class,
        '__construct()' => [$params->getHtmlRendererConfig()]
    ],

    /** component routes urlmatcher */
    DispatcherInterface::class => RouterDispatcher::class,
    RouteCollectorInterface::class => Group::create(),
    UrlGeneratorInterface::class => UrlGenerator::class,
    UrlMatcherInterface::class => static fn (ContainerInterface $container) => (
        new Router()
    )->buildRoutesConfig($container),

    /** component logger - target file */
    FileRotatorInterface::class => fn () => new FileRotator(
        $params->getFileRotatorMaxFileSize(),
        $params->getFileRotatorMaxFiles(),
        null,
        null
    ),
    FileTarget::class => static fn (ContainerInterface $container) => (
        new LogTargetFile()
    )->buildFileTargetConfig($container),
    LoggerInterface::class => static fn (ContainerInterface $container) => new Logger(
        ['file' => $container->get(FileTarget::class)]
    ),

    /** component events */
    Provider::class => static fn (ContainerInterface $container) => (
        new EventDispatcher()
    )->buildConfig($container),
    ListenerProviderInterface::class => Provider::class,
    EventDispatcherInterface::class => Dispatcher::class,

    /** component assets */
    AssetConverterInterface::class => static fn (ContainerInterface $container) => (
        new Assets()
    )->buildAssetConverterInterfaceConfig($container),
    AssetPublisherInterface::class => static fn (ContainerInterface $container) => (
        new Assets()
    )->buildAssetPublisherInterfaceConfig($container),
    AssetManager::class => static fn (ContainerInterface $container) => (
        new Assets()
    )->buildAssetManagerConfig($container),

    /** component view */
    WebView::class => static fn (ContainerInterface $container) => (
        new View()
    )->buildWebViewConfig($container),

    /** component validator */
    ValidatorFactoryInterface::class => ValidatorFactory::class,

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
