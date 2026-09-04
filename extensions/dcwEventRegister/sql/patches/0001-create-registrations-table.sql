-- Patch: create dcw_event_registrations table
-- See: Database & schema task (@Zaidusyy)

CREATE TABLE IF NOT EXISTS /*_*/dcw_event_registrations (
	reg_id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	event_id VARBINARY(255) NOT NULL,
	user_name VARCHAR(255) NOT NULL,
	user_email VARCHAR(255) NOT NULL,
	registered_at BINARY(14) NOT NULL,
	event_time BINARY(14) NOT NULL,
	confirmation_sent TINYINT(1) NOT NULL DEFAULT 0,
	reminder_sent TINYINT(1) NOT NULL DEFAULT 0
) /*$wgDBTableOptions*/;

CREATE UNIQUE INDEX /*i*/dcw_event_registrations_event_email
	ON /*_*/dcw_event_registrations (event_id, user_email);
