<?php

declare(strict_types=1);

namespace App\Framework\Handler;

use Psr\Http\{Message\ResponseInterface, Message\ServerRequestInterface, Server\RequestHandlerInterface};
use Yiisoft\{Http\Status, Router\CurrentRoute, Router\UrlGeneratorInterface, Yii\View\ViewRenderer};

final class NotFoundHandler implements RequestHandlerInterface
{
    public function __construct(
        private readonly UrlGeneratorInterface $urlGenerator,
        private readonly CurrentRoute $currentRoute,
        private readonly ViewRenderer $viewRenderer,
        private readonly string $viewPath = __DIR__ . '/view',
    ) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->viewRenderer
            ->withViewPath($this->viewPath)
            ->render('404', [
                'urlGenerator' => $this->urlGenerator,
                'currentRoute' => $this->currentRoute,
            ])
            ->withStatus(Status::NOT_FOUND);
    }
}
