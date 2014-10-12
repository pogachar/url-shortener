<?php namespace UrlShortener\Events;

class LinkWasGenerated {

	/**
	 * @var
	 */
	public $user_id;

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
	 * @param $user_id
	 * @param $url
	 * @param $hash
	 */
	function __construct($user_id, $url, $hash)
	{
		$this->user_id = $user_id;
		$this->url = $url;
		$this->hash = $hash;
	}
} 