<?php

declare(strict_types=1);

namespace App\Framework\EventHandler;

use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\View\WebView;
use Yiisoft\Yii\Middleware\Event\SetLocaleEvent;

final class SetLocaleEventHandler
{
    public function __construct(private readonly TranslatorInterface $translator, private readonly WebView $webView) {}

    public function handle(SetLocaleEvent $event): void
    {
        $this->translator->setLocale($event->getLocale());
        $this->webView->setLocale($event->getLocale());
    }
}
