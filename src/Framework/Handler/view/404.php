<?php

declare(strict_types=1);

use App\ApplicationParameters;
use PHPForge\Html\Group\Div;
use PHPForge\Html\Helper\Encode;
use PHPForge\Html\Img;
use PHPForge\Html\Semantic\H;
use PHPForge\Html\Textual\A;
use Yiisoft\View\WebView;

/**
 * @var ApplicationParameters $app
 * @var WebView $this
 */
$this->setTitle(Encode::content($app->t('site.404.title')));

echo Div::widget()
    ->class('flex flex-col justify-center items-center px-6 mx-auto xl:px-0 dark:bg-gray-400')
    ->content(
        Div::widget()
            ->class('block md:max-w-lg')
            ->content(
                Img::widget()
                    ->alt('404 image')
                    ->src('https://raw.githubusercontent.com/yii-tools/.github/61bbcb1b1f777740cce4200f95ae4bc0aa4350a8/images/app/404.svg'),
                Div::widget()
                    ->class('text-center mb-5')
                    ->content(
                        H::widget()
                            ->class('text-4xl font-extrabold dark:text-white')
                            ->content($app->t('site.404.title'))
                            ->tagName('h2'),
                        H::widget()
                            ->class('text-lg font-bold dark:text-white')
                            ->content($app->t('site.404.description.1'))
                            ->tagName('h6'),
                        H::widget()
                            ->class('text-lg font-bold dark:text-white')
                            ->content($app->t('site.404.description.2'))
                            ->tagName('h6'),
                        A::widget()
                            ->class('px-4 py-2 mt-3 mb-3 font-bold text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600')
                            ->href($app->urlGenerator->generate('home'))
                            ->content($app->t('site.404.button'))
                            ->type('button')
                    )
            )
    );
