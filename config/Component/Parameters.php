<?php

declare(strict_types=1);

namespace Yii\Component;

use App\Service\Parameters;
use Yii\Params;

$params = new Params();

return [
    /** component parameters */
    Parameters::class  => [
        '__class' => Parameters::class,
        '__construct()' => [$params->getApplicationConfig()]
    ]
];
