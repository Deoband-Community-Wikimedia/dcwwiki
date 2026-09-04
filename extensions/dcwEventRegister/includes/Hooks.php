<?php

namespace MediaWiki\Extension\DcwEventRegister;

use DatabaseUpdater;

class Hooks {

	/**
	 * @param DatabaseUpdater $updater
	 */
	public static function onLoadExtensionSchemaUpdates( DatabaseUpdater $updater ) {
		$updater->addExtensionTable(
			'dcw_event_registrations',
			__DIR__ . '/../sql/patches/0001-create-registrations-table.sql'
		);
	}
}
