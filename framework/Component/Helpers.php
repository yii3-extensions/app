<?php

declare(strict_types=1);

namespace Yii\Component;

use App\Service\Parameters;
use Yii\Params;
use Yiisoft\Aliases\Aliases;

$params = new Params();

return [
    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$params->getAliases()]
    ],
    Parameters::class  => [
        '__class' => Parameters::class,
        '__construct()' => [$params->getApplicationConfig()]
    ]
];
