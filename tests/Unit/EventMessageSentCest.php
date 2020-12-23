<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Tests\UnitTester;
use App\Event\EventMessageNotSent;
use Yii\Extension\Service\ServiceFlashMessage;
use Yii\Extension\Service\Event\MessageNotSent;
use Yiisoft\Session\Session;
use Yiisoft\Session\Flash\Flash;

final class EventMessageSentCest
{
    public function testExecute(UnitTester $I): void
    {
        $expected = [
            '__counters' => [
                'danger' => -1,
            ],
            'danger' => [
                [
                    'header' => "System mailer notification.",
                    'body' => 'testMe',
                ]
            ]
        ];

        $session = new Session();
        $flash = new Flash($session);
        $serviceFlashMessage = new ServiceFlashMessage($flash);

        $listener = new EventMessageNotSent();
        $event = new MessageNotSent('testMe');

        $listener->addFlash($event, $serviceFlashMessage);

        $I->assertEquals($expected, $session->get('__flash'));
    }
}
