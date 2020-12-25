<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use App\Tests\AcceptanceTester;

final class PageIndexCest
{
    public function indexPage(AcceptanceTester $I): void
    {
        $I->amOnPage('/');
        $I->wantTo('see page index.');
        $I->see('Hello World');
    }
}
