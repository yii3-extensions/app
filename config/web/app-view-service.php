<?php

declare(strict_types=1);

use Yii\Extension\Service\ViewService;

/** @var array $params */

return [
    ViewService::class  => [
        '__class' => ViewService::class,
        'defaultParameters()' => [$params['yii-extension/view-services']['defaultParameters']],
        'viewParameters()' => [$params['yii-extension/view-services']['viewParameters']],
    ],
];
