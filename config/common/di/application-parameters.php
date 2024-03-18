<?php

declare(strict_types=1);

use App\ApplicationParameters;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Definitions\Reference;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Translator\TranslatorInterface;

/** @var array $params */

return [
    ApplicationParameters::class => [
        'class' => ApplicationParameters::class,
        '__construct()' => [
            'aliases' => Reference::to(Aliases::class),
            'charset' => $params['app']['charset'] ?? 'UTF-8',
            'currentRoute' => Reference::to(CurrentRoute::class),
            'name' => $params['app']['name'] ?? 'My Project',
            'languages' => $params['locale']['languages'] ?? [],
            'locales' => $params['locale']['locales'] ?? [],
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
            'translator' => Reference::to(TranslatorInterface::class),
        ],
    ],
];
