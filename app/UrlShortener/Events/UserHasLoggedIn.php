<?php namespace UrlShortener\Events;

use UrlShortener\Users\User;

class UserHasLoggedIn {

	/**
	 * @var
	 */
	public $email;

	/**
	 * @var
	 */
	public $password;

	/**
	 * DTO
	 * @param $email
	 * @param $password
	 */
	function __construct($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
	}
} 