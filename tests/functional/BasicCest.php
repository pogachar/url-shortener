<?php
use \FunctionalTester;

class BasicCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function shortenAUrl(FunctionalTester $I)
    {
		$I->am('guest');
		$I->wantTo('generate a short url');

		$I->haveLink(['url' => 'http://www.google.com', 'hash' => 'goo']);

		$I->amOnPage('/');
		$I->fillField('url', 'http://www.google.com');
		$I->click('Shorten');

		$I->see('Here you go!');
		$I->see('http://localhost/goo');
	}

	public function provideEmptyField(FunctionalTester $I)
	{
		$I->am('guest');
		$I->wantTo('get a validation error');

		$I->amOnPage('/');
		$I->fillField('url', '');
		$I->click('Shorten');

		$I->seeCurrentUrlEquals('/');
		$I->see('The url field is required.');
	}

	public function provideInvalidData(FunctionalTester $I)
	{
		$I->am('guest');
		$I->wantTo('get a validation error');

		$I->amOnPage('/');
		$I->fillField('url', 'google.com');
		$I->click('Shorten');

		$I->see('The url format is invalid.');
	}

}