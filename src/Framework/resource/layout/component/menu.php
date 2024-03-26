<?php

declare(strict_types=1);

use App\ApplicationParameters;
use UIAwesome\Html\{Component\Flowbite\Menu, Component\Flowbite\NavBar, Multimedia\Img};
use Yiisoft\View\WebView;

/**
 * @var ApplicationParameters $app
 * @var WebView $this
 */
echo NavBar::widget()
    ->brandImage(
        Img::widget()->alt($app->copyright)->class('h-6 mr-3 sm:h-9')->src($app->brandImage)->width(200)
    )
    ->brandLink($app->brandLink)
    ->menu(
        Menu::widget()
            ->currentPath($app->currentRoute->getUri()?->getPath() ?? '')
            ->id('navbar-default')
            ->items(...$app->itemsMenu())
    );
echo $this->render('alert');
