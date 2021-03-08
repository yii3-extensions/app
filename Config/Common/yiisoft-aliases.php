<?php

declare(strict_types=1);

namespace Config\Common;

use Yiisoft\Aliases\Aliases;

// Define the application aliases here.
$aliases = [
    '@root' => dirname(__DIR__, 2),
    '@assets' => '@root/public/assets',
    '@assetsUrl' => '/assets',
    '@npm' => '@root/node_modules',
    '@resources' => '@root/resources',
    '@runtime' => '@root/runtime',
    '@vendor' => '@root/vendor',
    '@views' => '@resources/views',
];

return [
    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$aliases],
    ],
];
