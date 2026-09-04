<?php

namespace MediaWiki\Extension\DcwEventRegister;

use Job;

class SendReminderJob extends Job {

	public function __construct( $title, $params ) {
		parent::__construct( 'dcwSendReminder', $title, $params );
	}

	public function run() {
		// TODO: load registration row via RegistrationStore using
		// $this->params['reg_id'], send reminder email using
		// dcweventregister-email-reminder-subject / -body messages,
		// then call markReminderSent().
		return true;
	}
}
