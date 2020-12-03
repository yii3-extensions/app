<?php

declare(strict_types=1);

namespace App\Action;

use App\Service\ViewService;
use Psr\Http\Message\ResponseInterface;

final class AboutAction
{
    public function about(ViewService $view): ResponseInterface
    {
        return
            $view->renderWithLayout('site/about');
    }
}
