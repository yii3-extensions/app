<?php

declare(strict_types=1);

namespace Config\Common;

use Yiisoft\I18n\Locale;

// Define the application locale here.
$locale = 'en-US';

return [
    Locale::class => [
        'class' => Locale::class,
        '__construct()' => [
            $locale,
        ],
    ],
];
