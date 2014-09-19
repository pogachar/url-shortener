<?php namespace UrlShortener\Repositories;

use UrlShortener\Users\User;

interface UserRepositoryInterface {

	/**
	 * Save new user
	 * @param User $user
	 * @return mixed
	 */
	public function save(User $user);

	/**
	 * Login user
	 * @param $command
	 * @return mixed
	 */
	public function login($command);
} 