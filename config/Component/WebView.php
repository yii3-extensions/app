<?php

declare(strict_types=1);

namespace Yii\Component;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Yii\Params;
use Yiisoft\Aliases\Aliases;
use Yiisoft\View\Theme;
use Yiisoft\View\WebView;

$params = new Params();

return [
    /** component webview */
    WebView::class => static function (ContainerInterface $container) use ($params) {
        $defaultParameters = [];
        $aliases = $container->get(Aliases::class);

        $webView = new WebView(
            $aliases->get('@views'),
            $container->get(Theme::class),
            $container->get(EventDispatcherInterface::class),
            $container->get(LoggerInterface::class)
        );

        foreach ($params->getViewDefaultParameters() as $key => $value) {
            $defaultParameters[$key] = $container->get($value);
        }

        $webView->setDefaultParameters($defaultParameters);

        return $webView;
    }
];
