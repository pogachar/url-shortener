<?php namespace UrlShortener\Links;

class StoreLinkCommand {

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $hash;

    /**
	 * Store link DTO
     * @param string url
     * @param string hash
     */
    public function __construct($url, $hash)
    {
        $this->url = $url;
        $this->hash = $hash;
    }

}