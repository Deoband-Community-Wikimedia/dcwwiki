<?php
// DB connection logic

$host = 'localhost';
$db   = 'u572932744_dcw_certs';
$user = 'u572932744_dcwwiki_admin';
$pass = '94@#DCW@Mod@DCW'; // Default XAMPP/WAMP empty password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // True security against SQL injection
    PDO::ATTR_PERSISTENT         => true,  // Optimize by reusing the same DB connection
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Note: In a real production system, log this error securely rather than displaying it
    die("Database connection failed: " . $e->getMessage());
}
?>
