<?php namespace UrlShortener\Users;

class RegisterUserCommand {

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

	/**
	 * @var
	 */
	public $password_confirmation;

	/**
	 * Register user DTO
	 * @param $username
	 * @param $email
	 * @param $password
	 * @param $password_confirmation
	 */
    public function __construct($username, $email, $password, $password_confirmation)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
		$this->password_confirmation = $password_confirmation;
	}

}