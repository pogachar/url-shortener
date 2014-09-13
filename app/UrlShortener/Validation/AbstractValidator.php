<?php namespace UrlShortener\Validation;

use Illuminate\Validation\Factory;
use UrlShortener\Exceptions\ValidationException;

abstract class AbstractValidator {

	/**
	 * @var Factory
	 */
	private $validator;

	/**
	 * @param Factory $validator
	 */
	function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Returns true if validation passes otherwise ValidationException
	 * @param $data
	 * @return bool
	 * @throws ValidationException
	 */
	public function isValid($data)
	{
		$validation = $this->validator->make($data, static::$rules);

		if($validation->fails()) throw new ValidationException($validation->messages());

		return true;
	}
} 