<?php

use UrlShortener\Exceptions\ValidationException;
use UrlShortener\Users\ActivateUserCommand;
use UrlShortener\Users\RegisterUserCommand;
use UrlShortener\Users\User;
use UrlShortener\Validation\RegisterForm;

class RegistrationController extends \BaseController {

	/**
	 * @var RegisterForm
	 */
	private $registerForm;

	function __construct(RegisterForm $registerForm)
	{
		$this->registerForm = $registerForm;
	}
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
			$this->registerForm->isValid(Input::all());
		}
		catch (ValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getValidationErrors());
		}

		$this->execute(RegisterUserCommand::class);

		return Redirect::back()->withFlashMessage('Account created successfully. Validate your email before signing in.');
	}

	public function activate($id, $code)
	{
		$this->execute(ActivateUserCommand::class, compact('id', 'code'));

		return Redirect::home()->withFlashMessage('Account activated successfully. You can now log in.');
	}
}