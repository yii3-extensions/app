<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yii\Extension\Service\ViewService;

final class About
{
    public function run(ViewService $viewService): ResponseInterface
    {
        return $viewService->render('site/about');
    }
}
