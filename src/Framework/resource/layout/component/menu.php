<?php

declare(strict_types=1);

use App\ApplicationParameters;
use PHPForge\Component\Menu;
use PHPForge\Component\NavBar;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\View\WebView;

/**
 * @var ApplicationParameters $app
 * @var CurrentRoute $currentRoute
 * @var WebView $this
 */
echo NavBar::widget($app->getNavBarDefinitions())
    ->containerSuffix($this->render('alert'))
    ->menu(
        Menu::widget($app->getMenuDefinitions())
            ->currentPath($currentRoute?->getUri()->getPath())
            ->id('navbar-default')
            ->items(...$app->itemsMenu())
    );
