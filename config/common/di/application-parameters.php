<?php

declare(strict_types=1);

use App\ApplicationParameters;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Definitions\Reference;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/** @var array $params */

return [
    ApplicationParameters::class => [
        'class' => ApplicationParameters::class,
        '__construct()' => [
            'aliases' => Reference::to(Aliases::class),
            'charset' => $params['app']['charset'],
            'name' => $params['app']['name'],
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'translator' => Reference::to(TranslatorInterface::class),
        ],
    ],
];