<?php namespace UrlShortener\Presenters;

use UrlShortener\Exceptions\PresenterException;

trait PresentableTrait {

	/**
	 * @var
	 */
	protected $presenterInstance;

	/**
	 * Prepare a new or cached presenter instance
	 * @throws PresenterException
	 * @return mixed
	 */
	public function present()
	{
		if ( ! $this->presenter or ! class_exists($this->presenter))
		{
			throw new PresenterException('Please set the $presenter property to your presenter path.');
		}

		if ( ! $this->presenterInstance)
		{
			$this->presenterInstance = new $this->presenter($this);
		}

		return $this->presenterInstance;
	}
} 