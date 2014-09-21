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

	/**
	 * Display shortened URL
	 * @param $link
	 * @return string
	 */
	public function shortUrl($link)
	{
		$host = $_SERVER['HTTP_HOST'];

		return \HTML::link($link->hash, $host . '/' . $link->hash);
	}

	/**
	 * Display hostname of original link
	 * @param $link
	 * @return mixed
	 */
	public function host($link)
	{
		return parse_url(str_replace('www.', '',$link->url), PHP_URL_HOST);
	}

}