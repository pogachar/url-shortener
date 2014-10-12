<?php namespace UrlShortener\Links;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use UrlShortener\Facades\Shorten;
use UrlShortener\Repositories\LinkRepositoryInterface;

class StoreLinkCommandHandler implements CommandHandler {

	use DispatchableTrait;

	/**
	 * @var LinkRepositoryInterface
	 */
	private $repository;

	/**
	 * @var
	 */
	private $model;

	/**
	 * @param LinkRepositoryInterface $linkRepository
	 * @param Link $link
	 */
	function __construct(LinkRepositoryInterface $linkRepository, Link $link)
	{
		$this->repository = $linkRepository;
		$this->model = $link;
	}

    /**
     * Handle the command.
     * @param object $command
     * @return void
     */
    public function handle($command)
	{
		if($hash = Shorten::exists($command->url)) return $hash;

		$hash = Shorten::generateHash();

		$user_id = \Auth::user() ? \Auth::user()->id : 0;

		$link = $this->model->generate(
			$user_id, $command->url, $hash
		);

		$this->dispatchEventsFor($link);

		$this->repository->save($link);

		return $hash;
    }

}