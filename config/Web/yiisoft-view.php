<?php

declare(strict_types=1);

namespace Config\Web;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\View\Theme;
use Yiisoft\View\WebView;

return [
    WebView::class => static function (ContainerInterface $container) {
        $defaultParameters = [];
        $aliases = $container->get(Aliases::class);

        $webView = new WebView(
            $aliases->get('@views'),
            $container->get(Theme::class),
            $container->get(EventDispatcherInterface::class),
            $container->get(LoggerInterface::class)
        );

        $webView->setDefaultParameters($defaultParameters);

        return $webView;
    }
];
