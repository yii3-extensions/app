<?php

declare(strict_types=1);

namespace App\UseCase\Home;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class HomeAction
{
    public function run(ViewRenderer $viewRenderer): ResponseInterface
    {
        return $viewRenderer->withViewPath($this->getViewPath())->render('index');
    }

    public function getViewPath(): string
    {
        return __DIR__ . '/view';
    }
}
