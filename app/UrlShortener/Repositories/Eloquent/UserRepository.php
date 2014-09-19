<?php namespace UrlShortener\Repositories\Eloquent;

use UrlShortener\Exceptions\UserLoginException;
use UrlShortener\Repositories\UserRepositoryInterface;
use UrlShortener\Users\User;

class UserRepository implements UserRepositoryInterface {

	/**
	 * Save new user
	 * @param User $user
	 * @return bool|mixed
	 */
	public function save(User $user)
	{
		return $user->save();
	}

	/**
	 * Login user
	 * @param $command
	 * @throws UserLoginException
	 * @return mixed|void
	 */
	public function login($command)
	{
		$user = User::whereEmail($command->email)->firstOrFail();

		if($user->activated == 0) throw new UserLoginException('You must activate your account before signing in.');

		$credentials = [
			'email' 	=> $command->email,
			'password'	=> $command->password,
			'activated' => 1
		];

		if( ! \Auth::attempt($credentials)) throw new UserLoginException('Could not sign you in. Validate your credentials and try again.');
	}
}