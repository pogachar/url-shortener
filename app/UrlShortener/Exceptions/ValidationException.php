<?php namespace UrlShortener\Exceptions;

class ValidationException extends \Exception {

	/**
	 * @var string
	 */
	private $errors;

	function __construct($errors)
	{
		$this->errors = $errors;
	}

	/**
	 * Retrieve the validation errors
	 * @return string
	 */
	public function getErrors()
	{
		return $this->errors;
	}
} 