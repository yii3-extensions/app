<?php

declare(strict_types=1);

namespace App\Action;

use App\Service\View;
use Psr\Http\Message\ResponseInterface;

final class Index
{
    public function index(View $view): ResponseInterface
    {
        return $view->renderWithLayout(
            'site/index'
        );
    }
}
