<?php

namespace MediaWiki\Extension\DcwEventRegister;

/**
 * Handles reading and writing rows in dcw_event_registrations.
 */
class RegistrationStore {

	/**
	 * @param string $eventId
	 * @param string $userName
	 * @param string $userEmail
	 * @param string $eventTime MW timestamp
	 * @return bool True on success, false if duplicate
	 */
	public function register( string $eventId, string $userName, string $userEmail, string $eventTime ): bool {
		// TODO: insert into dcw_event_registrations, respecting the
		// unique key on (event_id, user_email)
		return false;
	}

	/**
	 * @param string $eventId
	 * @param string $userEmail
	 * @return bool
	 */
	public function isDuplicate( string $eventId, string $userEmail ): bool {
		// TODO: SELECT check against dcw_event_registrations
		return false;
	}

	/**
	 * @return array List of rows needing a reminder sent now
	 */
	public function getPendingReminders(): array {
		// TODO: SELECT rows where reminder_sent = 0
		// AND event_time - reminderOffsetMinutes <= NOW()
		return [];
	}

	/**
	 * @param int $regId
	 */
	public function markReminderSent( int $regId ): void {
		// TODO: UPDATE dcw_event_registrations SET reminder_sent = 1 WHERE reg_id = $regId
	}
}
