<?php

declare(strict_types=1);

use UIAwesome\Html\{Component\Flowbite\Alert, Group\Div};
use Yiisoft\Session\Flash\FlashInterface;

use function in_array;

/** @var FlashInterface $flash */
$flashMessages = $flash->getAll();
$html = [];

/**
 * @psalm-var array<string, array<string, string>> $flashMessages
 */
foreach ($flashMessages as $type => $messages) {
    if (in_array($type, ['danger', 'dark', 'info', 'success', 'warning'], true) === true) {
        /** @psalm-var string[][] $messages */
        foreach ($messages as $message) {
            $body = $message['body'] ?? '';

            if ($body !== '') {
                $html[] = Alert::widget()->definition('dismissible', $type)->content($body);
            }
        }
    }
}

echo Div::widget()->id('alert_dismissing')->content(...$html);
