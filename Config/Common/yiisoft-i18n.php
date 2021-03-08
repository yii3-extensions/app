<?php

declare(strict_types=1);

namespace Config\Common;

use Yiisoft\I18n\Locale;

// Define the application locale here.
return [
    Locale::class => [
        'class' => Locale::class,
        '__construct()' => [
            'en-US',
        ],
    ],
];
