<?php namespace UrlShortener\Links;

class Link extends \Eloquent {

	protected $fillable = ['url', 'hash'];

	/**
	 * Link presenter class location
	 * @var string
	 */
	protected $presenter = 'UrlShortener\Presenters\LinkPresenter';

}