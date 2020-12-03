<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;

final class WebControllerService
{
    private Flash $flash;
    private ResponseFactoryInterface $responseFactory;
    private UrlGeneratorInterface $url;

    public function __construct(
        Flash $flash,
        ResponseFactoryInterface $responseFactory,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->flash = $flash;
        $this->responseFactory = $responseFactory;
        $this->url = $urlGenerator;
    }

    public function withFlash(string $type, string $header, string $body, bool $removerAfterAccess = true): self
    {
        $this->flash->add(
            $type,
            [
                'header' => $header,
                'body' =>  $body
            ],
            $removerAfterAccess
        );

        return $this;
    }

    public function redirectResponse(string $url): ResponseInterface
    {
        return
            $this->responseFactory
                ->createResponse(302)
                ->withHeader('Location', $this->url->generate($url));
    }

    public function notFoundResponse(string $body = null): ResponseInterface
    {
        return
            $this
                ->withFlash(
                    'is-danger',
                    'Yii error notification',
                    $body ?: '<strong>404</strong> - The requested page does not exist.'
                )
                ->redirectResponse('index');
    }
}
