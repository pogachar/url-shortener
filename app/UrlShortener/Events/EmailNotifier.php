<?php namespace UrlShortener\Events;

use Laracasts\Commander\Events\EventListener;
use UrlShortener\Mailers\UserMailer;

class EmailNotifier extends EventListener {

	/**
	 * @var PasswordConfirmationMailer
	 */
	private $mailer;

	function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function whenUserHasRegistered(UserHasRegistered $event)
	{
		$this->mailer->sendAccountActivationTo($event->user);
	}
} 