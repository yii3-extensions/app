<?php

declare(strict_types=1);

use App\Event\ContactMessageSend;

return [
    ContactMessageSend::class => [[ContactMessageSend::class, 'addFlash']],
];
