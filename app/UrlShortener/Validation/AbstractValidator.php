<?php namespace UrlShortener\Validation;

use Illuminate\Validation\Factory;
use UrlShortener\Exceptions\ValidationException;

abstract class AbstractValidator {

	/**
	 * @var Factory
	 */
	protected $validator;

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
	 * @throws ValidationException
	 * @internal param $data
	 * @return bool
	 */
	public function isValid($data)
	{
		$data = $this->normalizeValidationData($data);

		$validation = $this->validator->make($data, static::$rules);

		if($validation->fails()) throw new ValidationException($validation->messages());

		return true;
	}

	/**
	 * Normalizes the data to array
	 * @param $data
	 * @return array
	 */
	private function normalizeValidationData($data)
	{
		if(is_object($data))
		{
			return get_object_vars($data);
		}

		return $data;
	}
} 