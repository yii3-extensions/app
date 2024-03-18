<?php

declare(strict_types=1);

use App\ApplicationParameters;
use UIAwesome\Html\{Graphic\Svg, Textual\A};

/** @var ApplicationParameters $app */
$linkIconDefinitions = [
    'class()' => ['text-gray-700 hover:text-gray-900 dark:hover:text-white dark:text-gray-400'],
    'rel()' => ['noopener'],
    'target()' => ['_blank'],
];

$svgDefinitions = [
    'fill()' => ['currentColor'],
    'height()' => ['32'],
];

// Github icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath($app->aliases->get('@fontawesome-free/svgs/brands/github.svg'))
    )
    ->href('https://github.com/yiisoft')
    ->title('GitHub');

// Slack icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath($app->aliases->get('@fontawesome-free/svgs/brands/slack.svg'))
    )
    ->href(
        'https://join.slack.com/t/yii/shared_invite/enQtMzQ4MDExMDcyNTk2LTc0NDQ2ZTZhNjkzZDgwYjE4YjZlNGQxZjFmZDBjZTU3NjViMDE4ZTMxNDRkZjVlNmM1ZTA1ODVmZGUwY2U3NDA'
    )
    ->title('Slack');

// Facebook icon
echo A::widget($linkIconDefinitions)
    ->class('md:block hidden')
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath($app->aliases->get('@fontawesome-free/svgs/brands/facebook.svg'))
    )
    ->href('https://www.facebook.com/groups/yiitalk/')
    ->title('Facebook');

// Twitter icon
echo A::widget($linkIconDefinitions)
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath($app->aliases->get('@fontawesome-free/svgs/brands/twitter.svg'))
    )
    ->href('https://twitter.com/yiiframework')
    ->title('Twitter');

// Telegram icon
echo A::widget($linkIconDefinitions)
    ->content(
        Svg::widget($svgDefinitions)
            ->filePath($app->aliases->get('@fontawesome-free/svgs/brands/telegram.svg'))
    )
    ->href('https://t.me/yii3ru')
    ->title('Telegram');
