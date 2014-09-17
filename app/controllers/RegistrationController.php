<?php

use UrlShortener\Exceptions\ValidationException;
use UrlShortener\Users\RegisterUserCommand;

class RegistrationController extends \BaseController {

	/**
	 * Show the registration form.
	 * GET /registration
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	 * Store a new user in storage.
	 * POST /registration
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->execute(RegisterUserCommand::class);
		}
		catch (ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getValidationErrors());
		}

		return Redirect::back()->withFlashMessage('Account successfully created. Validate your email before signing in.');
	}
}