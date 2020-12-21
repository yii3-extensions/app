<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yii\Extension\Service\ServiceView;

final class Index
{
    public function run(ServiceView $serviceView): ResponseInterface
    {
        return $serviceView->render('site/index');
    }
}
