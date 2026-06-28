# DCW Certificate Portal - Setup Instructions

This package contains a complete, optimized, and standalone dynamic certificate generation system built from scratch for `dcwwiki.org`. 

The system relies on PHP (8.0+) and MySQL, and includes its own pre-compiled libraries, meaning **you do not need to install Composer** to run this on your server.

## 1. Database Setup
1. Log into your hosting control panel (cPanel, Plesk, etc.) or phpMyAdmin.
2. Create a new MySQL database (e.g., `dcwwiki_certificates`).
3. Create a new database user and assign it to the database with all privileges.
4. Import the provided **`database.sql`** file into your new database. This will create the `participants` table and add a few test users.

## 2. Configuration
Open the **`config.php`** file in a text editor and update the connection details to match the production database you just created:

```php
$host = 'localhost'; // Usually 'localhost', but your host might provide a specific URL
$db   = 'dcwwiki_certificates'; // Your new database name
$user = 'your_db_username';     // Your database user
$pass = 'your_db_password';     // Your database password
```

## 3. Uploading to Your Server
Using an FTP client (like FileZilla) or your hosting's File Manager, upload all the files and folders directly to the directory where you want the portal to live. 

If you want it to be accessible at `https://dcwwiki.org/portal.php`, you should upload everything directly into your `public_html` or root web directory.

### Required Files & Folders:
* `portal.php`
* `generate.php`
* `config.php`
* `vendor/` (Contains the pre-installed TCPDF and FPDI engines)
* `fonts/` (Contains the Alex Brush font)
* `templates/` (Contains the blank PDF certificate template)

## 4. Testing
Once uploaded, navigate to `https://dcwwiki.org/portal.php` in your browser. Try entering one of the dummy users from the database (e.g., `Jane Doe` / `jane@example.com`). It should instantly download the dynamically generated PDF certificate!

## Security Notes
- `generate.php` strictly requires a POST request and will block direct URL access.
- The system uses PDO prepared statements, so it is fully protected against SQL injection.
- Certificates are generated in RAM and forced as a download directly to the user's browser. No PDF files are permanently saved to your server's disk, protecting privacy and saving storage space.
