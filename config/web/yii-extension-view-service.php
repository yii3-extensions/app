<?php

declare(strict_types=1);

use Yii\Extension\Service\ServiceView;

/** @var array $params */

return [
    ServiceView::class  => [
        '__class' => ServiceView::class,
        'defaultParameters()' => [$params['yii-extension/view-services']['defaultParameters']],
        'viewParameters()' => [$params['yii-extension/view-services']['viewParameters']],
    ],
];
