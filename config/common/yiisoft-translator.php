<?php

declare(strict_types=1);

namespace Config\Common;

use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Factory\Definitions\Reference;
use Yiisoft\Translator\CategorySource;
use Yiisoft\Translator\MessageFormatterInterface;
use Yiisoft\Translator\MessageReaderInterface;
use Yiisoft\Translator\Translator;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Translator\Message\Php\MessageSource;
use Yiisoft\Translator\Formatter\Intl\IntlMessageFormatter;

// Define the aplication settings translator here
$translatorPath = dirname(__DIR__, 2) . '/resources/locale';
$locale = 'en-US';
$fallBackLocale = null;
$defaultCategoryName = 'app';

return [
    MessageReaderInterface::class => [
        '__class' => MessageSource::class,
        '__construct()' =>  [$translatorPath]
    ],

    MessageFormatterInterface::class => IntlMessageFormatter::class,

    CategorySource::class => [
        '__class' => CategorySource::class,
        '__construct()' => [
            'name' => $defaultCategoryName,
        ],
    ],

    TranslatorInterface::class => [
        '__class' => Translator:: class,
        '__construct()' => [
            $locale,
            $fallBackLocale,
        ],
        'addCategorySource()' =>  [Reference::to(CategorySource::class)],
    ],
];
