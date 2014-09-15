<?php
use \FunctionalTester;

class LoggedInUserCest
{
	public static $username = 'FooBar';
	public static $email = 'test@email.com';
	public static $password = 'password';

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

	protected function login(FunctionalTester $I)
	{
		$I->am('member');
		$I->wantTo('log in');
		$I->haveAccount(compact('username', 'email', 'password'));

		$I->amOnPage('/');
		$I->fillField('email', self::$email);
		$I->fillField('password', self::$password);

		$I->seeCurrentUrlEquals('/@' . self::$username);
	}

    // tests
    public function register(FunctionalTester $I)
    {
		$I->am('user');
		$I->wantTo('register');

		$I->amOnPage('/register');
		$I->fillField('username', self::$username);
		$I->fillField('email', self::$email);
		$I->fillField('password', self::$password);
		$I->fillField('password_confirmation', self::$password);

		$I->click('Register');
		$I->seeCurrentUrlEquals('/');
		$I->see('You can now log in!');
    }
}