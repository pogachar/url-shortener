<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('generate a short url');

$I->haveLink(['url' => 'http://www.google.com', 'hash' => 'gugl']);

$I->amOnPage('/');
$I->fillField('url', 'http://www.google.com');
$I->click('Shorten');

$I->see('http://localhost/gugl');
$I->click('http://localhost/gugl');

$I->amOnPage('http://www.google.com');