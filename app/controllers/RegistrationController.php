<?php

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
		// temporary
		return Redirect::back()->withFlashMessage('User created');
	}
}