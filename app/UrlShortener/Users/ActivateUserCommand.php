<?php namespace UrlShortener\Users;

class ActivateUserCommand {

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $code;

    /**
     * @param string id
     * @param string code
     */
    public function __construct($id, $code)
    {
        $this->id = $id;
        $this->code = $code;
    }

}