<?php

declare(strict_types=1);

namespace Yii\Component;

use Yii\Params;
use Yiisoft\Aliases\Aliases;

$params = new Params();

return [
    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$params->getAliases()]
    ],
];
