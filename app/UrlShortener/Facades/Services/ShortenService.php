<?php namespace UrlShortener\Facades\Services;

use Laracasts\Commander\Events\DispatchableTrait;
use UrlShortener\Exceptions\NonExistentHashException;
use UrlShortener\Links\Link;
use UrlShortener\Repositories\LinkRepositoryInterface;

class ShortenService {

	use DispatchableTrait;

	/**
	 * @var LinkRepositoryInterface
	 */
	protected $linkRepository;

	/**
	 * @var Link
	 */
	protected $link;

	/**
	 * @param LinkRepositoryInterface $linkRepository
	 * @param Link $link
	 */
	function __construct(LinkRepositoryInterface $linkRepository, Link $link)
	{
		$this->repository = $linkRepository;
		$this->model = $link;
	}

	/**
	 * Check if url exists and return hash, otherwise generate new hash
	 * @param $url
	 * @return string
	 */
	public function exists($url)
	{
		$link = $this->repository->byUrl($url);

		return $link ? $link->hash : null;
	}

	/**
	 * Gets url from provided hash or throws an exception
	 * @param $hash
	 * @return mixed
	 * @throws NonExistentHashException
	 */
	public function getUrlByHash($hash)
	{
		$link = $this->repository->byHash($hash);

		if( ! $link) throw new NonExistentHashException('We could not find a URL associated with that hash');

		return $link->url;
	}

	/**
	 * Generates a random hash
	 * @param int $hashLength
	 * @return string
	 */
	public function generateHash($hashLength = 6)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, 5)), 0, $hashLength);
	}

}