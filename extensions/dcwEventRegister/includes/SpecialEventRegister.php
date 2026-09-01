<?php

namespace MediaWiki\Extension\DcwEventRegister;

use SpecialPage;

class SpecialEventRegister extends SpecialPage {

	public function __construct() {
		parent::__construct( 'EventRegister' );
	}

	/**
	 * @param string|null $par
	 */
	public function execute( $par ) {
		$this->setHeaders();
		$out = $this->getOutput();
		$out->setPageTitle( $this->msg( 'dcweventregister-title' )->text() );

		// TODO: build registration form (event id, name, email)
		// TODO: on submit -> validate input, check duplicate via RegistrationStore,
		//       insert row, send confirmation email, schedule SendReminderJob
		$out->addWikiMsg( 'dcweventregister-title' );
	}

	protected function getGroupName() {
		return 'other';
	}
}
