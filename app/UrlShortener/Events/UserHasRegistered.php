<?php namespace UrlShortener\Events;

use UrlShortener\Users\User;

class UserHasRegistered {

	/**
	 * @var User
	 */
	public $user;

	/**
	 * DTO
	 * @param User $user
	 */
	function __construct(User $user)
	{
		$this->user = $user;
	}
} 