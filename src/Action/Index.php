<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class Index
{
    public function run(ViewRenderer $viewRenderer, TranslatorInterface $translator): ResponseInterface
    {
        return $viewRenderer->render('site/index', ['translator' => $translator]);
    }
}
