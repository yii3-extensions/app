<?php

declare(strict_types=1);

use PHPForge\Component\Alert;
use PHPForge\Component\Cookbook\Flowbite\CookbookAlert;
use PHPForge\Html\Group\Div;
use Yiisoft\Session\Flash\FlashInterface;

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
                $html[] = Alert::widget(CookbookAlert::dismissing($type))->content($body);
            }
        }
    }
}

echo Div::widget()->id('alert_dismissing')->content(...$html);
