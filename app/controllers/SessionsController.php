<?php

use UrlShortener\Exceptions\ValidationException;
use UrlShortener\Users\LoginUserCommand;

class SessionsController extends \BaseController {

	/**
	 * Log the user in
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->execute(LoginUserCommand::class);
		}
		catch(ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getValidationErrors());
		}

		return Redirect::intended('/')->withFlashMessage('Welcome back');
	}

	/**
	 * Log the user out
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home();
	}

}