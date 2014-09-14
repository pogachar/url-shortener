<?php namespace UrlShortener\Repositories;

use UrlShortener\Links\Link;

interface LinkRepositoryInterface {

	/**
	 * Find a link by it's hash
	 * @param $hash
	 * @return mixed
	 */
	public function byHash($hash);

	/**
	 * Find a link by it's url
	 * @param $url
	 * @return mixed
	 */
	public function byUrl($url);

	/**
	 * Save a new link in database
	 * @param Link $link
	 * @return mixed
	 */
	public function save(Link $link);

}