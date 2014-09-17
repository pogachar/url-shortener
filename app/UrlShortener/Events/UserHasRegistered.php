<?php namespace UrlShortener\Events;

class UserHasRegistered {

	/**
	 * @var username
	 */
	public $username;

	/**
	 * @var
	 */
	public $email;

	/**
	 * @var
	 */
	public $password;

	/**
	 * @var
	 */
	public $password_confirmation;

	/**
	 * DTO
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $password_confirmation
	 */
	function __construct($username, $email, $password, $password_confirmation)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->password_confirmation = $password_confirmation;
	}
} 