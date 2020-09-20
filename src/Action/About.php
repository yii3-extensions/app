<?php

declare(strict_types=1);

namespace App\Action;

use App\Service\View;
use Psr\Http\Message\ResponseInterface;

final class About
{
    public function about(View $view): ResponseInterface
    {
        return $view->renderWithLayout(
            'site/about'
        );
    }
}
