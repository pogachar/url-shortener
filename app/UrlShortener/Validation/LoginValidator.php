<?php namespace UrlShortener\Validation;

class LoginValidator extends AbstractValidator {

	/**
	 * Login form rules
	 * @var array
	 */
	protected static $rules = [
		'email'		=> 'required|email',
		'password'	=> 'required'
	];
} 