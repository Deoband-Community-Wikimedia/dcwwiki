<?php
// 1. Prevent direct browser URL access (Must be a POST submission from the form)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 403 Forbidden");
    die("Access Denied: Direct access is prohibited.");
}

// 2. Sanitize and capture the incoming form inputs
$user_name  = isset($_POST['name']) ? trim($_POST['name']) : '';
$user_email = isset($_POST['email']) ? strtolower(trim($_POST['email'])) : '';
$file_id    = isset($_POST['file_id']) ? trim($_POST['file_id']) : '';

// 4. The Permission Matrix (Map File IDs to real filenames and authorized emails)
$permission_matrix = [
    'doc1' => [
        'filename' => 'Aafi.svg', // Real file hidden in secure_files
        'email'    => 'aafi@dcwwiki.org'
    ],
    'doc2' => [
        'filename' => 'legal_template_v2.pdf',
        'email'    => 'bob.jones@gmail.com'
    ],
    'cert' => [
        'filename' => 'blank_certificate.pdf',
        'email'    => 'aafi@dcwwiki.org'
    ]
];

// 5. Validation Check: Does this file ID even exist in our system?
if (!array_key_exists($file_id, $permission_matrix)) {
    header("HTTP/1.1 403 Forbidden");
    die("Access Denied: Invalid resource identifier.");
}

// 6. Validation Check: Does the email match the authorized guest for this specific file?
if ($user_email !== $permission_matrix[$file_id]['email']) {
    header("HTTP/1.1 403 Forbidden");
    die("Access Denied: Your email address is not authorized to retrieve this asset.");
}

// 7. Define the Private Path (Moving 1 folder UP from public_html into secure_files)
// Adjust the '../' count if your portal folder is nested deeper!
define('SECURE_DIR', __DIR__ . '/../secure_files/');
$real_filename = $permission_matrix[$file_id]['filename'];
$full_file_path = SECURE_DIR . $real_filename;

// 8. Verification Check: Confirm the file physically exists on the hard drive
if (!file_exists($full_file_path)) {
    header("HTTP/1.1 404 Not Found");
    die("System Error: The requested asset configuration is missing from the server filesystem.");
}

// 9. Log the successful validation to your ledger
$log_entry = date('Y-m-d H:i:s') . " | DOWNLOADED | Name: {$user_name} | Email: {$user_email} | File: {$real_filename}\n";
file_put_contents(SECURE_DIR . 'download_log.txt', $log_entry, FILE_APPEND);

// 10. OVERWRITE HEADERS: Force the browser to treat this stream as a secure file download
// Clear out anything else in the PHP output buffer to prevent file corruption
if (ob_get_level()) { ob_end_clean(); }

header('Content-Description: File Transfer');
header('Content-Type: application/pdf'); // Telling browser it is specifically a PDF
header('Content-Disposition: attachment; filename="' . basename($real_filename) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($full_file_path));

// Read the file directly into the server stream output buffer
readfile($full_file_path);
exit;