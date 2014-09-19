<?php namespace UrlShortener\Users;

class LoginUserCommand {

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
	 * Login User DTO
     * @param string email
     * @param string password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

}