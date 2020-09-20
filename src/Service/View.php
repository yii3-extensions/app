<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Csrf\CsrfToken;
use Yiisoft\DataResponse\DataResponse;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\View\ViewContextInterface;
use Yiisoft\View\WebView;

final class View implements ViewContextInterface
{
    protected Aliases $aliases;
    protected DataResponseFactoryInterface $responseFactory;
    private CsrfToken $csrfToken;
    private Flash $flash;
    private Parameters $parameters;
    private UrlGeneratorInterface $url;
    private UrlMatcherInterface $urlMatcher;
    private string $viewPath;
    private WebView $webView;

    public function __construct(
        Aliases $aliases,
        CsrfToken $csrfToken,
        Flash $flash,
        DataResponseFactoryInterface $responseFactory,
        Parameters $parameters,
        UrlGeneratorInterface $url,
        UrlMatcherInterface $urlMatcher,
        WebView $webView
    ) {
        $this->aliases = $aliases;
        $this->csrfToken = $csrfToken;
        $this->flash = $flash;
        $this->parameters = $parameters;
        $this->responseFactory = $responseFactory;
        $this->url = $url;
        $this->urlMatcher = $urlMatcher;
        $this->webView = $webView;
    }

    public function renderWithLayout(string $view, array $parameters = []): ResponseInterface
    {
         $csrf = $this->csrfToken->getValue();
         $content = $this->webView->render(
            '//layout/main',
            array_merge(
                [
                    'app' => $this->parameters,
                    'csrf' => $csrf,
                    'content' => $this->webView->render(
                        $view,
                        array_merge(
                            $parameters,
                            [
                                'app' => $this->parameters,
                                'csrf' => $csrf,
                                'url' => $this->url
                            ]
                        ),
                        $this
                    ),
                    'url' => $this->url,
                    'urlMatcher' => $this->urlMatcher
                ],
                $parameters
            ),
            $this
        );

        return $this->responseFactory->createResponse($content);
    }

    public function addFlash(string $type, string $header, string $body, bool $removerAfterAccess = true): void
    {
        $this->flash->add(
            $type,
            [
                'header' => $header,
                'body' =>  $body
            ],
            $removerAfterAccess
        );
    }

    public function getViewPath(): string
    {
        if (!isset($this->viewPath)) {
            $this->viewPath = $this->webView->getBasePath();
        }

        return $this->aliases->get($this->viewPath);
    }

    public function redirect(string $url): DataResponse
    {
        return $this->responseFactory
            ->createResponse(302)
            ->withHeader(
                'Location',
                $this->url->generate($url)
            );
    }

    public function viewPath(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }
}
