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

3. Run `php maintenance/update.php` to create the `dcw_event_registrations` table.
4. Make sure the job runner is active (`runJobs.php` or a background job runner)
   so reminder jobs actually get processed.

## Overriding email text

Edit the `dcweventregister-email-confirmation-subject`,
`dcweventregister-email-confirmation-body`,
`dcweventregister-email-reminder-subject`, and
`dcweventregister-email-reminder-body` messages either by editing
`i18n/en.json` or via the corresponding `MediaWiki:` pages on-wiki.

## Status

This is an MVP scaffold. See project issue tracker for outstanding
sub-tasks (DB logic, email sending, job scheduling, security review).
