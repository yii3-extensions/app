<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yii\Extension\Service\ViewService;

final class IndexAction
{
    public function index(ViewService $view): ResponseInterface
    {
        return
            $view
                ->renderWithLayout('site/index');
    }
}
