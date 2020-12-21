<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;
use Yii\Extension\Service\ServiceView;
use Yiisoft\View\Exception\ViewNotFoundException;

final class NotFound implements RequestHandlerInterface
{
    private ServiceView $serviceView;

    public function __construct(ServiceView $serviceView)
    {
        $this->serviceView = $serviceView;
    }

    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     *
     * @param ServerRequestInterface $request
     *
     * @throws Throwable|ViewNotFoundException
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->serviceView->render('site/404');
    }
}
