<?php 

class Mail {
	/**
	 * Set to parameter
	 * @var string
	 */
	private $to;

	/**
	 * Subject of the email
	 * @var string
	 */
	private $subject;

	/**
	 * Email from user
	 * @var string
	 */
	private $from;

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Send mail to
	 * @return object [message]
	 */
	public function send() {
		$this->to 			= 'rowdyklijnsmit@gmail.com';
		$this->subject 		= 'Vraag';
		$this->from 		= $_POST['email'];
		$message = '<b>From:</b> ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '<br><br>' . '<b>Message: </b><hr>' . $_POST['question'];
		$email = mail($this->to, $this->subject, $message);

        // Debugging
//		die(print_r($email));

        // Check if the mail has sent
		if ($email == true) {
			$_SESSION['email'] = 'Vraag succesvol verzonden!';
			View::redirect('/');
		}
		else {
			$_SESSION['email'] = 'Vraag niet verzonden! Probeer het opnieuw';
			View::redirect('/');
		}
	}
}