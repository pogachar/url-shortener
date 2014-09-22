<?php

use UrlShortener\Repositories\LinkRepositoryInterface;

class PagesController extends \BaseController {

	/**
	 * @var LinkRepositoryInterface
	 */
	private $linkRepository;

	function __construct(LinkRepositoryInterface $linkRepository)
	{
		$this->linkRepository = $linkRepository;
		$this->beforeFilter('auth');
	}

	/**
	 * Logged in User history page
	 * GET /history
	 * @return Response
	 */
	public function history()
	{
		$links = $this->linkRepository->getAllUserLinks(Auth::user());

		return View::make('user.history', compact('links'));
	}

	/**
	 * Logged in User settings page
	 * GET /settings
	 * @return Response
	 */
	public function settings()
	{
		$user = Auth::user();

		return View::make('user.settings', compact('user'));
	}

	public function updateSettings($username)
	{

	}

}