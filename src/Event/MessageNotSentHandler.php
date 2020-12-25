<?php

declare(strict_types=1);

namespace App\Event;

use Yii\Extension\Service\ServiceFlashMessage;
use Yii\Extension\Service\Event\MessageNotSent;

final class MessageNotSentHandler
{
    public function addFlash(MessageNotSent $messageNotSent, ServiceFlashMessage $serviceFlashMessage): void
    {
        if ($messageNotSent->getAddFlash()) {
            $serviceFlashMessage->run(
                $messageNotSent->getType(),
                $messageNotSent->getHeader(),
                $messageNotSent->getBody()
            );
        }
    }
}
