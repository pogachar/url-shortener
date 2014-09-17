<?php namespace UrlShortener\Repositories\Eloquent;


use UrlShortener\Repositories\UserRepositoryInterface;
use UrlShortener\Users\User;

class UserRepository implements UserRepositoryInterface {

	public function save(User $user)
	{
		return $user->save();
	}
}