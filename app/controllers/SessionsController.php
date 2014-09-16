<?php

use UrlShortener\Exceptions\ValidationException;
use UrlShortener\Validation\LoginForm;
use UrlShortener\Users\User;

class SessionsController extends \BaseController {

	/**
	 * @var LoginForm
	 */
	private $loginForm;

	function __construct(LoginForm $loginForm)
	{
		$this->loginForm = $loginForm;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');

		try
		{
			$this->loginForm->isValid($input);
		}
		catch(ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getValidationErrors());
		}

		// Log the user in

		return Redirect::home()->withFlashMessage('User logged in');
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