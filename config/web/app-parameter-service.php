<?php

declare(strict_types=1);

use App\Service\ParameterService;

/** @var array $params */

return [
    ParameterService::class  => [
        '__class' => ParameterService::class,
        '__construct()' => [
            $params['app']
        ]
    ]
];
