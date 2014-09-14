<?php namespace UrlShortener\Links;

use Laracasts\Commander\Events\EventGenerator;
use UrlShortener\Events\LinkWasGenerated;

class Link extends \Eloquent {

	use EventGenerator;

	protected $fillable = ['url', 'hash'];

	/**
	 * Link presenter class location
	 * @var string
	 */
	protected $presenter = 'UrlShortener\Presenters\LinkPresenter';

	/**
	 * Generate a new link
	 * @param $url
	 * @param $hash
	 * @return static
	 */
	public function generate($url, $hash)
	{
		$link = new static(compact('url', 'hash'));

		$link->raise(new LinkWasGenerated($url, $hash));

		return $link;
	}

}