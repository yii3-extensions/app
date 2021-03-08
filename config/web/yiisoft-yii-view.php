<?php

declare(strict_types=1);

namespace Config\Web;

use App\ViewInjection\LayoutViewInjection;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Yii\View\CsrfViewInjection;
use Yiisoft\Yii\View\ViewRenderer;

$injections = [
    Reference::to(CsrfViewInjection::class),
    Reference::to(LayoutViewInjection::class),
];

return [
    ViewRenderer::class => [
        '__construct()' => [
            'viewBasePath' => dirname(__DIR__, 2) . '/resources/views',
            'layout' => dirname(__DIR__, 2) . '/resources/layout/main',
            'injections' => $injections,
        ],
    ],
];
