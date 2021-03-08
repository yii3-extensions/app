<?php

declare(strict_types=1);

namespace Config\Web;

use Yiisoft\DataResponse\DataResponseFactory;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\DataResponse\DataResponseFormatterInterface;
use Yiisoft\DataResponse\Formatter\HtmlDataResponseFormatter;

return [
    DataResponseFormatterInterface::class => HtmlDataResponseFormatter::class,
    DataResponseFactoryInterface::class => DataResponseFactory::class,
];
