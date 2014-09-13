<?php namespace UrlShortener\Repositories\Eloquent;

use UrlShortener\Links\Link;
use UrlShortener\Repositories\LinkRepositoryInterface;

class LinkRepository implements LinkRepositoryInterface {

	/**
	 * @var User
	 */
	private $user;

	/**
	 * Create a new Link instance
	 * @param Link $link
	 */
	public function __construct(Link $link)
	{
		$this->model = $link;
	}

	/**
	 * Find a link by it's hash
	 * @param $hash
	 * @return mixed
	 */
	public function byHash($hash)
	{
		return $this->model->whereHash($hash)->first();
	}

	/**
	 * Find a link by it's url
	 * @param $url
	 * @return mixed
	 */
	public function byUrl($url)
	{
		return $this->model->whereUrl($url)->first();
	}

	/**
	 * Store a new link in database
	 * @param array $data
	 * @return mixed
	 */
	public function create(array $data)
	{
		return $this->model->create($data);
	}
}