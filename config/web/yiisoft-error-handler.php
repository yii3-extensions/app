<?php

declare(strict_types=1);

namespace Config\Web;

use Yiisoft\ErrorHandler\Renderer\HtmlRenderer;
use Yiisoft\ErrorHandler\ThrowableRendererInterface;

return [
    ThrowableRendererInterface::class => HtmlRenderer::class,
];
