<?php namespace UrlShortener\Repositories\Eloquent;

use UrlShortener\Links\Link;
use UrlShortener\Repositories\LinkRepositoryInterface;
use UrlShortener\Users\User;

class LinkRepository implements LinkRepositoryInterface {

	/**
	 * @var User
	 */
	private $model;

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
	 * Save a new link in database
	 * @param Link $link
	 * @return bool|mixed
	 */
	public function save(Link $link)
	{
		return $link->save();
	}

	/**
	 * Retrieve all links belonging to a user
	 * @param User $user
	 * @return mixed
	 */
	public function getAllUserLinks(User $user)
	{
		return $user->links()->with('user')->get();
	}
}