<?php namespace UrlShortener\Repositories;

use UrlShortener\Users\User;

interface UserRepositoryInterface {

	public function save(User $user);
} 