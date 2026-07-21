# Deoband Community Wikimedia, MediaWiki instance 

This repository contains the configuration, skins, extensions, and customizations for the **Deoband Community Wikimedia (DCW)** MediaWiki installation. 

## Structure
Following the upgrade to MW 1.46, this repository has been cleaned up to track only the essential components required for our wiki installation:

- `/skins/` - Custom and installed MediaWiki skins.
- `/extensions/` - MediaWiki extensions.
- `/languages/` - Custom language configurations.
- `/reflections5/` - Custom reflection integrations.
- `LocalSettings.php` - The primary MediaWiki configuration file.

*Note: Core MediaWiki files, caches, and images are ignored via `.gitignore` to prevent clutter and keep the repository focused solely on our configurations.*

## Environment Variables (.env)
For security, all sensitive data (database credentials, SMTP passwords, secret keys, OAuth tokens) has been moved out of `LocalSettings.php` and is now handled securely using a `.env` file. 

**Do NOT commit `.env` to this repository.**

To run the application locally or deploy it to production, create a `.env` file in the root directory using the following template:

```ini
# Database Credentials
MW_DB_TYPE=mysql
MW_DB_SERVER=127.0.0.1
MW_DB_NAME=database_name
MW_DB_USER=database_user
MW_DB_PASSWORD=your_secure_password
MW_DB_PREFIX=your_prefix_

# Secret Keys
MW_SECRET_KEY=your_secret_key
MW_UPGRADE_KEY=your_upgrade_key

# SMTP / Email Configuration
MW_SMTP_SERVER=smtp.example.com
MW_SMTP_PORT=465
MW_SMTP_USER=noreply@example.com
MW_SMTP_PASSWORD=smtp_password
SMTP_SECURE=ssl
MW_CONFIRM_ACCOUNT_CONTACT=noreply@example.com
MW_PASSWORD_SENDER=noreply@example.com

# OAuth Configuration
MW_OAUTH_CLIENT_ID=oauth_client_id
MW_OAUTH_CLIENT_SECRET=oauth_client_secret
```

## Deployment
When pulling these changes to the production server:
1. Ensure the `.env` file is properly configured with production credentials.
2. Ensure you do not overwrite the `images/` directory.
3. Run `composer install` if there are updates to vendor dependencies.

