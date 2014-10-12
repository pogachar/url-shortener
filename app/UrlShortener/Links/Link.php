<?php namespace UrlShortener\Links;

use Laracasts\Commander\Events\EventGenerator;
use UrlShortener\Events\LinkWasGenerated;
use UrlShortener\Presenters\PresentableTrait;

class Link extends \Eloquent {

	use EventGenerator, PresentableTrait;

	protected $fillable = ['user_id', 'url', 'hash'];

	/**
	 * Link presenter class location
	 * @var string
	 */
	protected $presenter = 'UrlShortener\Presenters\LinkPresenter';

	/**
	 * Generate a new link
	 * @param $user_id
	 * @param $url
	 * @param $hash
	 * @return static
	 */
	public function generate($user_id, $url, $hash)
	{
		$link = new static(compact('user_id', 'url', 'hash'));

		$link->raise(new LinkWasGenerated($user_id, $url, $hash));

		return $link;
	}

	/**
	 * Link belongs to a user
	 */
	public function user()
	{
		return $this->belongsTo('UrlShortener\Users\User');
	}

}