<?php

declare(strict_types=1);

namespace Yii\Component;

use Yii\Params;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\View\Theme;
use Yiisoft\View\WebView;

final class View
{
    public function buildWebViewConfig(ContainerInterface $container): WebView
    {
        $defaultParameters = [];
        $params = new Params();

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
}
