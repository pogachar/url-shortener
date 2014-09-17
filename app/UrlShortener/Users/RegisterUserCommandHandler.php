<?php namespace UrlShortener\Users;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use UrlShortener\Repositories\UserRepositoryInterface;
use UrlShortener\Validation\RegisterForm;

class RegisterUserCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * @var RegisterForm
	 */
	//private $registerForm;

	/**
	 * @var UserRepositoryInterface
	 */
	private $repository;

	/**
	 * @var User
	 */
	private $model;

	/**
	 * @param UserRepositoryInterface $repository
	 * @param User $user
	 */
	function __construct(UserRepositoryInterface $repository, User $user)
	{
		$this->repository = $repository;
		$this->model = $user;
	}

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
		$user = $this->model->register(
			$command->username,
			$command->email,
			$command->password,
			$command->password_confirmation
		);

		$this->dispatchEventsFor($user);

		$this->repository->save($user);

		return $user;
    }

}