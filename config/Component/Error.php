<?php

declare(strict_types=1);

namespace Yii\Component;

use Yii\Params;
use Yiisoft\ErrorHandler\HtmlRenderer;
use Yiisoft\ErrorHandler\ThrowableRendererInterface;

/**
 * @var array $params
 */

$params = new Params();

return [
    ThrowableRendererInterface::class => HtmlRenderer::class,

    HtmlRenderer::class => [
        '__class' => HtmlRenderer::class,
        '__construct()' => [$params->getHtmlRendererConfig()]
    ],
];
