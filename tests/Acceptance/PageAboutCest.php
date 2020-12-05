<?php

declare(strict_types=1);

namespace App\Tests\Acceptance;

use App\Tests\AcceptanceTester;

final class PageAboutCest
{
    public function _before(AcceptanceTester $I): void
    {
        $I->amOnPage('/about');
    }

    /**
     * @depends App\Tests\Acceptance\PageIndexCest:indexPage
     */
    public function aboutPage(AcceptanceTester $I): void
    {
        $I->wantTo('see about page.');
        $I->see('This is the About page. You may modify the following file to customize its content.');
    }
}
