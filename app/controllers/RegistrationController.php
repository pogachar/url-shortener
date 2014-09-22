<?php

use UrlShortener\Users\ActivateUserCommand;
use UrlShortener\Users\RegisterUserCommand;
use UrlShortener\Validation\RegisterForm;

class RegistrationController extends \BaseController {

	/**
	 * @var RegisterForm
	 */
	private $registerForm;

	function __construct(RegisterForm $registerForm)
	{
		$this->registerForm = $registerForm;
		$this->beforeFilter('guest');
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
		$this->registerForm->isValid(Input::all());

		$this->execute(RegisterUserCommand::class);

		return Redirect::home()->withFlashMessage('Account created successfully. Validate your email before signing in.');
	}

	/**
	 * Account activation from email link
	 * @param $id
	 * @param $code
	 * @return mixed
	 */
	public function activate($id, $code)
	{
		$this->execute(ActivateUserCommand::class, compact('id', 'code'));

		return Redirect::home()->withFlashMessage('Account activated successfully. You can now log in.');
	}
}