<?php 
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('generate a short url');

$I->amOnPage('/');
$I->fillField('url', 'http://www.google.com');
$I->click('Shorten');

$I->seeCurrentUrlEquals('/');
$I->see('http://urlshortener.dev/');
$I->see('http://www.google.com');
