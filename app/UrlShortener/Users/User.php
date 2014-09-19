<?php namespace UrlShortener\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use UrlShortener\Events\UserHasLoggedIn;
use UrlShortener\Events\UserHasRegistered;
use Hash;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $fillable = ['username', 'email', 'password', 'activated', 'activation_code'];

	/**
	 * User presenter class location
	 * @var string
	 */
	protected $presenter = 'UrlShortener\Presenters\UserPresenter';

	/**
	 * Password must be hashed
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	/**
	 * Register a new user Event generator
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $activation_code
	 * @return static
	 */
	public function register($username, $email, $password, $activation_code)
	{
		$user = new static(compact('username', 'email', 'password', 'activation_code'));

		$user->raise(new UserHasRegistered($user));

		return $user;
	}

	/**
	 * Login a user Event generator
	 * @param $email
	 * @param $password
	 * @return static
	 */
	public function login($email, $password)
	{
		$user = new static(compact('email', 'password'));

		$user->raise(new UserHasLoggedIn($email, $password));

		return $user;
	}
}
