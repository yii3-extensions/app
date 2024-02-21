<?php

declare(strict_types=1);

use App\ApplicationParameters;
use PHPForge\Html\Group\Div;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Semantic\H;
use Yiisoft\View\WebView;

/**
 * @var ApplicationParameters $app
 * @var WebView $this
 */
$this->setTitle(Encode::content($app->t('site.menu.home')));

echo Div::widget()
    ->class('text-center')
    ->content(
        H::widget()
            ->class('mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white')
            ->content($app->t('site.description'))
            ->tagName('h1')
    );
