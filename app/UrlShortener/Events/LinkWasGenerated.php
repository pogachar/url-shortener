<?php namespace UrlShortener\Events;

class LinkWasGenerated {

	/**
	 * @var
	 */
	public $url;

	/**
	 * @var
	 */
	public $hash;

	/**
	 * DTO
	 * @param $url
	 * @param $hash
	 */
	function __construct($url, $hash)
	{
		$this->url = $url;
		$this->hash = $hash;
	}
} 