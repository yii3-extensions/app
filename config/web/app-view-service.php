<?php

declare(strict_types=1);

use App\Service\Parameter;
use Yii\Extension\Service\ViewService;
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
                'app' => Reference::to(Parameter::class),
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
