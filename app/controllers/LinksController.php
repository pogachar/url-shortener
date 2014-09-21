<?php

use UrlShortener\Facades\Shorten;
use UrlShortener\Links\StoreLinkCommand;
use UrlShortener\Validation\LinkForm;

class LinksController extends \BaseController {

	/**
	 * @var LinkForm
	 */
	private $linkForm;

	/**
	 * @param LinkForm $linkForm
	 */
	function __construct(LinkForm $linkForm)
	{
		$this->linkForm = $linkForm;
	}

	/**
	 * Display the home page.
	 * GET /
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('links.create');
	}

	/**
	 * Store a new link shortener.
	 * POST /
	 * @return Response
	 */
	public function store()
	{
		$hash = $this->execute(StoreLinkCommand::class);

		return Redirect::home()->withFlashMessage('Here you go! ' . HTML::link($hash));
	}

	/**
	 * Get the hash and redirect to specified url
	 * GET /{hash}
	 * @param  int  $hash
	 * @return Response
	 */
	public function show($hash)
	{
		$url = Shorten::getUrlByHash($hash);

		return Redirect::to($url);
	}
}