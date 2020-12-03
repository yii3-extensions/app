<?php

declare(strict_types=1);

namespace App\Action;

use App\Service\ViewService;
use Psr\Http\Message\ResponseInterface;

final class IndexAction
{
    public function index(ViewService $view): ResponseInterface
    {
        return
            $view->renderWithLayout('site/index');
    }
}
