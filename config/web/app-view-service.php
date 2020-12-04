<?php

declare(strict_types=1);

use App\Service\ParameterService;
use App\Service\ViewService;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;

/** @var array $params */

return [
    ViewService::class  => [
        '__class' => ViewService::class,
        'defaultParameters()' => [
            [
                'app' => Reference::to(ParameterService::class),
                'assetManager' => Reference::to(AssetManager::class),
                'url' => Reference::to(UrlGeneratorInterface::class),
                'urlMatcher' => Reference::to(UrlMatcherInterface::class),
            ],
        ],
        'viewParameters()' => [
            [
                'field' => Reference::to(Field::class),
            ]
        ]
    ],
];
