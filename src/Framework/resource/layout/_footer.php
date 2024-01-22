<?php

declare(strict_types=1);

use App\ApplicationParameters;
use PHPForge\Html\Div;
use PHPForge\Html\Footer;
use Yiisoft\View\WebView;

/**
 * @var ApplicationParameters $app
 * @var WebView $this
 */
echo Footer::widget()
    ->class('footer bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900')
    ->content(
        Div::widget()
            ->class('mx-auto w-full container p-2 sm:p-4')
            ->content(
                Div::widget()
                    ->class('sm:flex sm:items-center sm:justify-between')
                    ->content(
                        Div::widget()->class('text-center')->content($app->getCredits()),
                        Div::widget()
                            ->class('flex mt-4 space-x-6 items-center justify-center sm:mt-0 p-2')
                            ->content(
                                $app->getIconGithub(),
                                $app->getIconSlack(),
                                $app->getIconFacebook(),
                                $app->getIconTwitter(),
                                $app->getIconTelegram(),
                                $app->getToggleTheme(),
                                $app->getSelectorLanguage(),
                            )
                    )
            )
    );
