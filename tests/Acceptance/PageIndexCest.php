<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use App\Tests\AcceptanceTester;

final class PageIndexCest
{
    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
    }

    public function indexPage(AcceptanceTester $I): void
    {
        $I->wantTo('see page index.');
        $I->see('Hello World');
    }
}
