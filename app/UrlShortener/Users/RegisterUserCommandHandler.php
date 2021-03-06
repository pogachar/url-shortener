<?php namespace UrlShortener\Users;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use UrlShortener\Facades\Shorten;
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
		$activation_code = Shorten::generateHash(40);

		$user = $this->model->register(
			$command->username,
			$command->email,
			$command->password,
			$activation_code
		);

		$this->repository->save($user);

		$this->dispatchEventsFor($user);

		return $user;
    }

}