<?php

declare(strict_types=1);

namespace Yii\Component;

use Yiisoft\Validator\ValidatorFactory;
use Yiisoft\Validator\ValidatorFactoryInterface;

return [
    /** component validator */
    ValidatorFactoryInterface::class => ValidatorFactory::class,
];
