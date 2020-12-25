<?php

declare(strict_types=1);

use Yii\Extension\Service\ServiceParameter;

/** @var array $params */

return [
    ServiceParameter::class  => [
        '__class' => ServiceParameter::class,
        '__construct()' => [
            $params['app']
        ]
    ]
];
