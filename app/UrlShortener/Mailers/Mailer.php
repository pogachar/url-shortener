<?php namespace UrlShortener\Mailers;

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer {

	private $mail;

	function __construct(Mail $mail)
	{
		$this->mail = $mail;
	}

	public function sendTo($user, $subject, $view, $data = [])
	{
		$this->mail->send($view, $data, function($message) use($user, $subject)
		{
			$message->to($user->email)->subject($subject);
		});
	}
} 