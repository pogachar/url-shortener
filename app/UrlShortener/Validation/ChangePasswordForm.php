<?php namespace UrlShortener\Validation;

class ChangePasswordForm extends AbstractValidator {

	/**
	* Change password form rules
	* @var array
	*/
	protected static $rules = [
		'old_password'	=> 'required|exists:users,password',
		'password'		=> 'required|confirmed|min:6'
	];
} 