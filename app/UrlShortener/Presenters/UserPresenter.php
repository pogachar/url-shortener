<?php namespace UrlShortener\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use UrlShortener\Users\User;

class UserPresenter extends BasePresenter {

	/**
	 * @var User
	 */
	private $user;

	/**
	 * Create a new UserPresenter instance
	 * @param User $user
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}
} 