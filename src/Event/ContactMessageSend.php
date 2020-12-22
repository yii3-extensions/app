<?php

declare(strict_types=1);

namespace App\Event;

use Yii\Extension\Service\ServiceFlashMessage;

final class ContactMessageSend
{
    private ServiceFlashMessage $serviceFlashMessage;

    public function __construct(ServiceFlashMessage $serviceFlashMessage)
    {
        $this->serviceFlashMessage = $serviceFlashMessage;
    }

    public function addFlash(): void
    {
        $this->serviceFlashMessage->run(
            'success',
            'System mailer notification.',
            'Thanks to contact us, we\'ll get in touch with you as soon as possible.',
        );
    }
}
