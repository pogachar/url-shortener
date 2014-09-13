<?php namespace UrlShortener\Validation;

class RegisterValidator extends AbstractValidator {

	/**
	 * Registration form rules
	 * @var array
	 */
	protected static $rules = [
		'email'		=> 'required|email|unique:users,email',
		'password'	=> 'required|confirmed|min:6'
	];
} 