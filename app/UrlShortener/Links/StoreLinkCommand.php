<?php namespace UrlShortener\Links;

class StoreLinkCommand {

    /**
     * @var string
     */
    public $url;

    /**
	 * Store link DTO
     * @param string url
     * @param string hash
     */
    function __construct($url)
    {
        $this->url = $url;
    }

}