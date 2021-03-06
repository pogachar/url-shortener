<?php namespace UrlShortener\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 * @return void
	 */
	public function register()
	{
		\Event::listen('UrlShortener.Events.LinkWasGenerated', 'UrlShortener\Validation\LinkForm@isValid');
		\Event::listen('UrlShortener.Events.UserHasRegistered', 'UrlShortener\Events\EmailNotifier');
		\Event::listen('UrlShortener.Events.UserHasLoggedIn', 'UrlShortener\Validation\LoginForm@isValid');

	}
}