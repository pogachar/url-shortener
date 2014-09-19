<?php namespace UrlShortener\Users;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use UrlShortener\Repositories\UserRepositoryInterface;

class LoginUserCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * @var User
	 */
	private $model;

	/**
	 * @var UserRepositoryInterface
	 */
	private $repository;

	function __construct(UserRepositoryInterface $repository, User $user)
	{
		$this->model = $user;
		$this->repository = $repository;
	}
    /**
     * Handle the command.
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
		$user = $this->model->login(
			$command->email,
			$command->password
		);

		$this->dispatchEventsFor($user);

		$this->repository->login($command);

		return $user;
    }

}