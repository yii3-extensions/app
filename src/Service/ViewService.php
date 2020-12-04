<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Csrf\CsrfToken;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\View\ViewContextInterface;
use Yiisoft\View\WebView;

final class ViewService implements ViewContextInterface
{
    private Aliases $aliases;
    private CsrfToken $csrf;
    protected DataResponseFactoryInterface $responseFactory;
    private ?string $viewPath = null;
    private array $viewParameters;
    private WebView $webView;

    public function __construct(
        Aliases $aliases,
        CsrfToken $csrf,
        DataResponseFactoryInterface $responseFactory,
        WebView $webView
    ) {
        $this->aliases = $aliases;
        $this->csrf = $csrf;
        $this->responseFactory = $responseFactory;
        $this->webView = $webView;
    }

    public function renderWithLayout(
        string $view,
        array $viewParameters = [],
        array $layoutParameters = []
    ): ResponseInterface {
        $content = $this->webView->render(
            '//layout/main',
            array_merge(
                [
                    'content' => $this->webView->render(
                        $view,
                        array_merge($viewParameters, $this->viewParameters),
                        $this
                    )
                ],
                $layoutParameters,
            ),
            $this
        );

        return $this->responseFactory->createResponse($content);
    }

    public function getViewPath(): string
    {
        if ($this->viewPath === null) {
            $this->viewPath = $this->webView->getBasePath();
        }

        return $this->aliases->get($this->viewPath);
    }

    public function viewPath(string $viewPath): self
    {
        $this->viewPath = $viewPath;

        return $this;
    }

    public function defaultParameters(array $value): void
    {
        $this->webView->setDefaultParameters(
            array_merge(
                [
                    'csrf' => $this->csrf->getValue(),
                ],
                $value
            )
        );
    }

    public function viewParameters(array $value): void
    {
        $this->viewParameters = $value;
    }
}
