# dcwEventRegister

A small MediaWiki extension for dcwwiki that lets users register for events,
sends an immediate confirmation email, and schedules a reminder email
~30 minutes before the event starts.

## Install

1. Copy this folder to `extensions/dcwEventRegister` in your MediaWiki install.
2. Add to `LocalSettings.php`:

   ```php
   wfLoadExtension( 'dcwEventRegister' );
   $wgDcwEventRegisterSettings = [
       'senderAddress' => 'noreply@dcwwiki.org',
       'reminderOffsetMinutes' => 30,
   ];
   ```

3. The `dcw_event_registrations` table schema and its creation (via `update.php`
   or a SQL patch) are tracked separately as part of the "Database & schema"
   task — see #27.
4. Reminder delivery is handled by a separate maintenance/cron script rather
   than a delayed JobQueue job, since our JobQueueDB setup does not support
   delayed jobs. See #27 for details.

## Overriding email text

Edit the `dcweventregister-email-confirmation-subject`,
`dcweventregister-email-confirmation-body`,
`dcweventregister-email-reminder-subject`, and
`dcweventregister-email-reminder-body` messages either by editing
`i18n/en.json` or via the corresponding `MediaWiki:` pages on-wiki.

## Status

This is an MVP scaffold covering the Special:EventRegister page and
extension structure. Database schema, reminder delivery, and email
sending are tracked separately — see project issue #27.
