<?php namespace UrlShortener\Repositories;

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
	 * Store a new link in database
	 * @param array $data
	 * @return mixed
	 */
	public function create(array $data);
} 