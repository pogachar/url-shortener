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
		$this->execute(LoginUserCommand::class);

		return Redirect::intended('/history')->withFlashMessage('Welcome back');
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