<?php

declare(strict_types=1);

use App\ApplicationParameters;
use UIAwesome\Html\Component\Flowbite\{Dropdown, Item};

/** @var ApplicationParameters $app */
$items = [];

foreach ($app->locales as $key => $value) {
    $icon = match ($key) {
        'en' => 'us',
        'zh' => 'cn',
        default => $key,
    };

    $items[] = Item::widget()
        ->iconClass('fi fi-' . $icon . ' fis me-2')
        ->label($app->t("site.selector.language.$key"))
        ->link($app->urlGenerator->generateFromCurrent(['_language' => $key]))
        ->active($app->translator->getLocale() === ($key === 'en' ? 'en' : $value));
}

echo Dropdown::widget()->definition('language', 'blue')->id('selector-language')->items(...$items);
