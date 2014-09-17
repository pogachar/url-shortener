<?php namespace UrlShortener\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
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

	protected $fillable = ['username', 'email', 'password', 'activated'];

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
	 * Register a new user
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $password_confirmation
	 * @return static
	 */
	public function register($username, $email, $password, $password_confirmation)
	{
		$user = new static(compact('username', 'email', 'password', 'password_confirmation'));

		$user->raise(new UserHasRegistered($username, $email, $password, $password_confirmation));

		return $user;
	}
}
