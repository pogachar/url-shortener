<?php
$I = new FunctionalTester($scenario);
$I->am('guest');
$I->wantTo('get real link');

$I->haveLink(['url' => 'http://www.google.com', 'hash' => 'gugl']);

$I->amOnPage('/gugl');
$I->amOnPage('http://www.google.com'); 