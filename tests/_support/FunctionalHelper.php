<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module
{

	public function haveLink($overrides = [])
	{
		return $this->have('UrlShortener\Links\Link', $overrides);
	}

	public function haveAccount($overrides = [])
	{
		return $this->have('UrlShortener\Users\User', $overrides);
	}

	private function have($model, $overrides = [])
	{
		return TestDummy::create($model, $overrides);
	}
}