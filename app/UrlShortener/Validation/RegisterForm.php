<?php namespace UrlShortener\Validation;

class RegisterForm extends AbstractValidator {

	/**
	 * Registration form rules
	 * @var array
	 */
	protected static $rules = [
		'username'	=> 'required|unique:users,username|min:4',
		'email'		=> 'required|email|unique:users,email',
		'password'	=> 'required|confirmed|min:6'
	];
} 