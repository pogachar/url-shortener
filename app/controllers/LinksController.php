<?php

use UrlShortener\Exceptions\NonExistentHashException;
use UrlShortener\Exceptions\ValidationException;
use UrlShortener\Facades\Shorten;
use UrlShortener\Links\StoreLinkCommand;
use UrlShortener\Validation\LinkForm;

class LinksController extends \BaseController {

	/**
	 * @var LinkValidator
	 */
	private $linkValidator;

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
		try {
			$hash = $this->execute(StoreLinkCommand::class);
		}
		catch (ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getValidationErrors());
		}

		return Redirect::home()->withHash($hash);
	}

	/**
	 * Get the hash and redirect to specified url
	 * GET /{hash}
	 *
	 * @param  int  $hash
	 * @return Response
	 */
	public function show($hash)
	{
		try {
			$url = Shorten::getUrlByHash($hash);
		}
		catch (NonExistentHashException $e)
		{
			return Redirect::home()->withFlashMessage('We could not find a URL associated with that hash');
		}

		return Redirect::to($url);

	}






	/**
	 * Update the specified resource in storage.
	 * PUT /links/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /links/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}