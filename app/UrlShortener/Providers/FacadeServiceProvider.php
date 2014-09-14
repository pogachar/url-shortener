<?php namespace UrlShortener\Providers;

use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('Shorten', 'UrlShortener\Facades\Services\ShortenService');
	}
}