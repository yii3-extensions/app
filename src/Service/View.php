<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Csrf\CsrfToken;
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
    private CsrfToken $csrf;
    private Flash $flash;
    private Parameters $app;
    private UrlGeneratorInterface $url;
    private UrlMatcherInterface $urlMatcher;
    private ?string $viewPath = null;
    private WebView $webView;

    public function __construct(
        Aliases $aliases,
        CsrfToken $csrf,
        DataResponseFactoryInterface $responseFactory,
        Flash $flash,
        Parameters $app,
        UrlGeneratorInterface $url,
        UrlMatcherInterface $urlMatcher,
        WebView $webView
    ) {
        $this->aliases = $aliases;
        $this->app = $app;
        $this->csrf = $csrf;
        $this->flash = $flash;
        $this->responseFactory = $responseFactory;
        $this->url = $url;
        $this->urlMatcher = $urlMatcher;
        $this->webView = $webView;
    }

    public function renderWithLayout(string $view, array $parameters = []): ResponseInterface
    {
        $parameters = array_merge(
            $parameters,
            [
                'app' => $this->app,
                'csrf' => $this->csrf->getValue(),
                'url' => $this->url,
                'urlMatcher' => $this->urlMatcher
            ]
        );

        $content = $this->webView->render(
            '//layout/main',
            array_merge(
                [
                    'content' => $this->webView->render($view, $parameters, $this),
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
        if ($this->viewPath === null) {
            $this->viewPath = $this->webView->getBasePath();
        }

        return $this->aliases->get($this->viewPath);
    }

    public function viewPath(string $viewPath): void
    {
        $this->viewPath = $viewPath;
    }
}
