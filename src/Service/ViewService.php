<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Assets\AssetManager;
use Yiisoft\Csrf\CsrfToken;
use Yiisoft\DataResponse\DataResponseFactoryInterface;
use Yiisoft\Form\Widget\Field;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Router\UrlMatcherInterface;
use Yiisoft\View\ViewContextInterface;
use Yiisoft\View\WebView;

final class ViewService implements ViewContextInterface
{
    private Aliases $aliases;
    private ParameterService $app;
    private AssetManager $assetManager;
    private CsrfToken $csrf;
    private Field $field;
    protected DataResponseFactoryInterface $responseFactory;
    private UrlGeneratorInterface $url;
    private UrlMatcherInterface $urlMatcher;
    private ?string $viewPath = null;
    private WebView $webView;

    public function __construct(
        Aliases $aliases,
        ParameterService $app,
        AssetManager $assetManager,
        CsrfToken $csrf,
        Field $field,
        DataResponseFactoryInterface $responseFactory,
        UrlMatcherInterface $urlMatcher,
        UrlGeneratorInterface $url,
        WebView $webView
    ) {
        $this->aliases = $aliases;
        $this->app = $app;
        $this->assetManager = $assetManager;
        $this->csrf = $csrf;
        $this->field = $field;
        $this->responseFactory = $responseFactory;
        $this->url = $url;
        $this->urlMatcher = $urlMatcher;
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
                        array_merge($viewParameters, $this->viewParameters()),
                        $this
                    )
                ],
                array_merge($layoutParameters, $this->layoutParameters())
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

    private function layoutParameters(): array
    {
        return [
            'app' => $this->app,
            'assetManager' => $this->assetManager,
            'csrf' => $this->csrf->getValue(),
            'url' => $this->url,
            'urlMatcher' => $this->urlMatcher
        ];
    }

    private function viewParameters(): array
    {
        return [
            'assetManager' => $this->assetManager,
            'csrf' => $this->csrf->getValue(),
            'field' => $this->field,
        ];
    }
}
