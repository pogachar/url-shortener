<?php namespace UrlShortener\Users;

use Laracasts\Commander\CommandHandler;
use UrlShortener\Exceptions\InvalidConfirmationCodeException;

class ActivateUserCommandHandler implements CommandHandler {

	/**
	 * @var User
	 */
	private $model;

	function __construct(User $user)
	{
		$this->model = $user;
	}
	/**
	 * Handle the command.
	 * @param object $command
	 * @throws InvalidConfirmationCodeException
	 * @return void
	 */
    public function handle($command)
    {
		$user = User::findOrFail($command->id);

		if($command->code !== $user->activation_code) throw new InvalidConfirmationCodeException;

		$user->activated = 1;
		$user->activation_code = null;
		$user->save();
    }

}