<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use App\Tests\Support\AcceptanceTester;

final class NotFoundHandlerCest
{
    public function about(AcceptanceTester $I): void
    {
        $I->amOnPage('/about');
        $I->wantTo('see about page.');
        $I->see('Page not found');
        $I->see('Oops! Looks like you followed a bad link.');
        $I->see('If you think this is a problem with us, please tell us.');
        $I->click('Go to home');
        $I->expectTo('see page home.');
        $I->see('The high-performance PHP framework.');
    }
}
