<?php namespace UrlShortener\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Register the repository service provider
	 */
	public function register()
	{
		$this->app->bind(
			'UrlShortener\Repositories\LinkRepositoryInterface',
			'UrlShortener\Repositories\Eloquent\LinkRepository'
		);
		$this->app->bind(
			'UrlShortener\Repositories\UserRepositoryInterface',
			'UrlShortener\Repositories\Eloquent\UserRepository'
		);
	}
}