<?php

declare(strict_types=1);

namespace App\Event;

use Yii\Extension\Service\ServiceFlashMessage;
use Yiisoft\Router\UrlMatcherInterface;

final class EventMessageSent
{
    public function addFlash(
        ServiceFlashMessage $serviceFlashMessage,
        UrlMatcherInterface $urlMatcher
    ): void {
        $currentUri = $urlMatcher->getCurrentUri();

        if ($currentUri !== null && $currentUri->getPath() === '/contact') {
            $serviceFlashMessage->run(
                'success',
                'System mailer notification.',
                'Thanks to contact us, we\'ll get in touch with you as soon as possible.',
            );
        }
    }
}
