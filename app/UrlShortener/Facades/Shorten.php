<?php namespace UrlShortener\Facades;

use Illuminate\Support\Facades\Facade;

class Shorten extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'Shorten';
	}
} 