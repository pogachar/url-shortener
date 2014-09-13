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
} 