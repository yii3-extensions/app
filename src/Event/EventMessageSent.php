<?php

declare(strict_types=1);

namespace App\Event;

use Yii\Extension\Service\ServiceFlashMessage;

final class EventMessageSent
{
    public function addFlash(ServiceFlashMessage $serviceFlashMessage): void
    {
        $serviceFlashMessage->run(
            'success',
            'System mailer notification.',
            'Thanks to contact us, we\'ll get in touch with you as soon as possible.',
        );
    }
}
