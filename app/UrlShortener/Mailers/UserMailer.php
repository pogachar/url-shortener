<?php namespace UrlShortener\Mailers;

use UrlShortener\Users\User;

class UserMailer extends Mailer {

	public function sendAccountActivationTo(User $user)
	{
		$subject = 'Url Shortener password confirmation';
		$view = 'emails.auth.activation';

		$this->sendTo($user, $subject, $view, compact('user'));
	}
} 