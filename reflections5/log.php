<?php
// Start session for login state tracking
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- SECURE CONFIGURATION ---
require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('ADMIN_USER', $_ENV['MW_REFLECTIONS_ADMIN_USER'] ?? 'Aafi'); 
define('ADMIN_PASSWORD', $_ENV['MW_REFLECTIONS_ADMIN_PASSWORD'] ?? '');

// Handle Logout action cleanly
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['log_authenticated']);
    header("Location: log.php");
    exit;
}

// Handle Login Form Authentication Check
$login_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === ADMIN_USER && $_POST['password'] === ADMIN_PASSWORD) {
        $_SESSION['log_authenticated'] = true;
    } else {
        $login_error = "Invalid username or passphrase. Access denied.";
    }
}

// Check if user is logged in
$is_authenticated = isset($_SESSION['log_authenticated']) && $_SESSION['log_authenticated'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCW@5 - Reflection Audit System</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
            padding: 30px 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #edf2f7;
            padding-bottom: 15px;
            gap: 20px;
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .dashboard-logo {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }
        h2 { color: #2c3e50; font-size: 1.4rem; }
        .logout-btn {
            background-color: #e53e3e;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: background 0.2s ease;
            white-space: nowrap;
        }
        .logout-btn:hover { background-color: #c53030; }
        
        /* Protection Shield Login Window */
        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 35px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            text-align: center;
        }
        .login-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
            object-fit: contain;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 11px;
            margin-top: 12px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            font-size: 1rem;
            text-align: center;
        }
        .login-box input[type="text"]:focus,
        .login-box input[type="password"]:focus {
            border-color: #4A90E2;
            outline: none;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
        }
        .login-box button {
            background: #4A90E2;
            color: white;
            border: none;
            padding: 11px 20px;
            width: 100%;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.95rem;
            margin-top: 18px;
        }
        .login-box button:hover { background: #357ABD; }
        .error { color: #e53e3e; font-size: 0.9rem; margin-top: 12px; font-weight: 500; }
        
        /* Table Layout Configuration */
        .table-responsive { overflow-x: auto; }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            text-align: left;
        }
        th, td { padding: 12px 15px; border-bottom: 1px solid #e2e8f0; vertical-align: top; }
        th { background-color: #f7fafc; color: #4a5568; font-weight: 600; }
        tr:hover td { background-color: #f8fafc; }
        
        /* Dynamic Layout Badges */
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-success { background-color: #c6f6d5; color: #22543d; }
        .badge-failed { background-color: #fed7d7; color: #742a2a; }
        .auth-id { font-family: monospace; font-size: 0.95rem; color: #2d3748; font-weight: 600; background: #edf2f7; padding: 2px 6px; border-radius: 4px; }
        .empty-state { text-align: center; color: #718096; padding: 50px 0; font-style: italic; }
        .error-text { color: #c53030; font-family: monospace; font-size: 0.85rem; }
        .success-text { color: #2f855a; font-size: 0.85rem; }
    </style>
    
    <link rel="icon" type="image/svg+xml" href="https://upload.wikimedia.org/wikipedia/commons/0/0a/Deoband_Community_Wikimedia_logo.svg">
</head>
<body>

<?php if (!$is_authenticated): ?>
    <!-- Security Shield Portal Form -->
    <div class="login-box">
        <!-- Official DCW SVG Logo Integration Asset -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Deoband_Community_Wikimedia_logo.svg" alt="Deoband Community Wikimedia Logo" class="login-logo">
        
        <h2>System Authentication</h2>
        <p style="color: #718096; font-size: 0.85rem; margin-top: 5px;">Access restricted to administrators</p>
        
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <?php if (!empty($login_error)): ?>
                <div class="error"><?php echo $login_error; ?></div>
            <?php endif; ?>
            <button type="submit">Access Audit Engine</button>
        </form>
    </div>
<?php else: ?>
    <!-- Main Log Dashboard Interface View -->
    <div class="container">
        <div class="header-flex">
            <div class="header-brand">
                <!-- Inline Small Contextual Brand Logo -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/0a/Deoband_Community_Wikimedia_logo.svg" alt="DCW Logo" class="dashboard-logo">
                <h2>DCW@5 Email Delivery & Authentication Audit Engine</h2>
            </div>
            <a href="log.php?action=logout" class="logout-btn">Secure Exit</a>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 155px;">Timestamp</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 140px;">Authentication ID</th>
                        <th>Submitter Name</th>
                        <th>Email Address</th>
                        <th>System Execution Notes</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $log_path = __DIR__ . '/audit_data.log';
                if (file_exists($log_path) && filesize($log_path) > 0) {
                    $log_lines = file($log_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    $log_lines = array_reverse($log_lines);

                    foreach ($log_lines as $line) {
                        if (preg_match('/^\[(.*?)\] \[(.*?)\] \[(.*?)\] (.*?)(?: \| Error: (.*))?$/', $line, $matches)) {
                            $timestamp   = htmlspecialchars($matches[1]);
                            $status      = htmlspecialchars($matches[2]);
                            $auth_id     = htmlspecialchars($matches[3]);
                            
                            $details     = explode(' | ', $matches[4]);
                            $name        = htmlspecialchars($details[0] ?? '');
                            $email       = htmlspecialchars($details[1] ?? '');
                            
                            $has_error   = isset($matches[5]) && !empty($matches[5]);
                            $error_notes = $has_error ? htmlspecialchars($matches[5]) : 'Delivered cleanly.';
                            
                            $badge_class = ($status === 'SUCCESS') ? 'badge-success' : 'badge-failed';
                            $text_style  = ($status === 'SUCCESS') ? 'success-text' : 'error-text';
                            
                            echo "<tr>";
                            echo "<td>{$timestamp}</td>";
                            echo "<td><span class='badge {$badge_class}'>{$status}</span></td>";
                            echo "<td><span class='auth-id'>{$auth_id}</span></td>";
                            echo "<td>{$name}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td><span class='{$text_style}'>{$error_notes}</span></td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='6' class='empty-state'>No transaction history recorded yet. Submissions will populate automatically.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

</body>
</html>