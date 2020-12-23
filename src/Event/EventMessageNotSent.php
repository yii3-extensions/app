<?php

declare(strict_types=1);

namespace App\Event;

use Yii\Extension\Service\ServiceFlashMessage;
use Yii\Extension\Service\Event\MessageNotSent;

final class EventMessageNotSent
{
    public function addFlash(MessageNotSent $messageNotSend, ServiceFlashMessage $serviceFlashMessage): void
    {
        $serviceFlashMessage->run(
            'danger',
            'System mailer notification.',
            $messageNotSend->getErrorMessage(),
        );
    }
}
