<?php namespace UrlShortener\Presenters;

use McCool\LaravelAutoPresenter\BasePresenter;
use UrlShortener\Links\Link;

class LinkPresenter extends BasePresenter {

	/**
	 * @var Link
	 */
	private $link;

	/**
	 * Create a new LinkPresenter instance
	 * @param Link $link
	 */
	public function __construct(Link $link)
	{
		$this->link = $link;
	}

	public function shortUrl($link)
	{
		$host = $_SERVER['HTTP_HOST'];

		return \HTML::link($link->hash, $host . '/' . $link->hash);
	}

	public function host($link)
	{
		$host = parse_url($link->url, PHP_URL_HOST);

		return $host;
	}
} 