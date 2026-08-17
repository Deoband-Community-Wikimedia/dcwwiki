<?php
// dcwwiki.org/reflections5/index.php (Main Logic & Display Hub)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load reflections data dynamically
$selected_reflections = [];
if (file_exists(__DIR__ . '/reflections.php')) {
    require_once __DIR__ . '/reflections.php';
}

// Load environment variables securely
require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// --- FLUID ADAPTIVE ROTATION LOGIC ---
$left_reflections = [];
$right_reflections = [];

if (!empty($selected_reflections)) {
    $total_available = count($selected_reflections);
    $sample_count = min($total_available, 4);
    
    if ($sample_count >= 2) {
        $random_keys = array_rand($selected_reflections, $sample_count);
        if (!is_array($random_keys)) { 
            $random_keys = [$random_keys]; 
        }
        shuffle($random_keys);
        
        for ($i = 0; $i < $sample_count; $i++) {
            $item = $selected_reflections[$random_keys[$i]];
            if ($i % 2 === 0) {
                $left_reflections[] = $item;
            } else {
                $right_reflections[] = $item;
            }
        }
    } else {
        $left_reflections[] = $selected_reflections[0];
    }
}

// Color classes helper for cycling
$color_palette = ['color-blue', 'color-green', 'color-purple', 'color-amber'];
$color_index = 0; // Global tracker to keep colors distinct across both sidebars

// --- CONFIGURATION ---
$to_email = $_ENV['MW_REFLECTIONS_TO_EMAIL'] ?? '';
$from_email = $_ENV['MW_SMTP_USER'] ?? '';
$from_display_name = $_ENV['MW_REFLECTIONS_DISPLAY'] ?? '';

$smtp_host = $_ENV['MW_SMTP_SERVER'] ?? '';
$smtp_port =$_ENV['MW_SMTP_PORT'] ?? 465;
$smtp_user = $_ENV['MW_SMTP_USER'] ?? '';
$smtp_pass = $_ENV['MW_SMTP_PASSWORD'] ?? '';

$message_sent = false;
$error_message = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (empty($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

// Handle Submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['form_token']) || $_POST['form_token'] !== $_SESSION['form_token']) {
        $error_message = "Session expired or duplicate submission detected.";
    } else {
        $name = strip_tags(trim($_POST['name'] ?? ''));
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $reflection = strip_tags(trim($_POST['reflection'] ?? ''));

        if (empty($name) || empty($email) || empty($reflection)) {
            $error_message = "All fields are required.";
        } elseif (!$email) {
            $error_message = "Invalid email format.";
        } else {
            $notification_id = strtoupper(uniqid('DCW'));

            if (!function_exists('write_audit_log')) {
                function write_audit_log($status, $auth_id, $name, $email, $error_detail = "") {
                    $log_file = __DIR__ . '/audit_data.log';
                    $log_line = sprintf("[%s] [%s] [%s] %s | %s %s\n", date("Y-m-d H:i:s"), $status, $auth_id, $name, $email, (!empty($error_detail) ? " | Error: " . $error_detail : ""));
                    file_put_contents($log_file, $log_line, FILE_APPEND | LOCK_EX);
                }
            }

            if (!function_exists('is_gibberish')) {
                function is_gibberish($text) {
                    $text = strtolower(trim($text));
                    if (strlen($text) < 6) return false;
                    if (preg_match('/[^aeiou\s\d\p{P}]{5,}/u', $text)) return true;
                    if (preg_match('/(.)\1{3,}/u', $text)) return true;
                    $words = explode(' ', $text);
                    foreach ($words as $word) {
                        if (strlen($word) > 35) return true;
                    }
                    return false;
                }
            }

            $email_parts = explode('@', $_POST['email'] ?? '');
            $email_username = $email_parts[0] ?? '';

            if (!function_exists('has_already_submitted')) {
                function has_already_submitted($email_to_check) {
                    $log_file = __DIR__ . '/audit_data.log';
                    if (!file_exists($log_file) || filesize($log_file) === 0) return false;
                    $handle = fopen($log_file, 'r');
                    if ($handle) {
                        while (($line = fgets($handle)) !== false) {
                            if (strpos($line, '[SUCCESS]') !== false && strpos($line, '| ' . $email_to_check) !== false) {
                                fclose($handle);
                                return true;
                            }
                        }
                        fclose($handle);
                    }
                    return false;
                }
            }

            if (is_gibberish($reflection) || is_gibberish($name) || is_gibberish($email_username)) {
                $error_message = "Submission flagged as unreadable clutter.";
                write_audit_log("FAILED", "BLOCKED", $name, $email, "Gibberish input.");
            } elseif (has_already_submitted($email)) {
                $error_message = "You have already submitted a reflection. If you want to revise it, please contact our moderators at moderator@dcwwiki.org";
                write_audit_log("FAILED", "DUPLICATE", $name, $email, "Blocked repeat submission attempt.");
            } else {

                $moderator_body = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;'>
                    <div style='background-color: #1a365d; padding: 20px; color: #ffffff; text-align: center;'>
                        <h2 style='margin: 0; font-size: 22px; color: #ffffff;'>DCW@5 Reflection Review</h2>
                    </div>
                    <div style='padding: 24px; background-color: #ffffff; color: #333333; line-height: 1.6;'>
                        <p>A new community reflection has been submitted and is pending review for the website.</p>
                        <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                        <p><strong>Submitter Name:</strong> " . htmlspecialchars($name) . "</p>
                        <p><strong>Submitter Email:</strong> " . htmlspecialchars($email) . "</p>
                        <blockquote style='background-color: #f7fafc; border-left: 4px solid #4a90e2; margin: 20px 0; padding: 15px; font-style: italic; color: #4a5568;'>
                            \"" . nl2br(htmlspecialchars($reflection)) . "\"
                        </blockquote>
                        <p style='font-size: 12px; color: #a0aec0; text-align: center; margin-top: 20px;'>Authenticated system tracking key: {$notification_id}</p>
                    </div>
                </div>";

                $submitter_body = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;'>
                    <div style='background-color: #2b6cb0; padding: 20px; color: #ffffff; text-align: center;'>
                        <h2 style='margin: 0; font-size: 22px; color: #ffffff;'>Thank You for Your Reflection!</h2>
                    </div>
                    <div style='padding: 24px; background-color: #ffffff; color: #333333; line-height: 1.6;'>
                        <p>Dear " . htmlspecialchars($name) . ",</p>
                        <p>Thank you for sharing your thoughts with us as we celebrate <strong>five years of knowledge activism</strong> at Deoband Community Wikimedia.</p>
                        <p>Our team is reviewing the submissions, and selected entries will be featured directly on our anniversary board.</p>
                        <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                        <p style='font-style: italic; color: #718096; background-color: #f7fafc; padding: 15px; border-radius: 4px;'>
                            \"" . nl2br(htmlspecialchars($reflection)) . "\"
                        </p>
                        <p style='margin-top: 25px;'>Warm regards,<br><strong>Deoband Community Wikimedia Team</strong></p>
                    </div>
                </div>";

                try {
                    $mail = new PHPMailer(true);
                    $mail->isSMTP();
                    $mail->Host       = $smtp_host;
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $smtp_user;
                    $mail->Password   = $smtp_pass;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                    $mail->Port       = $smtp_port;
                    $mail->CharSet    = 'UTF-8';
                    
                    $mail->addCustomHeader('Auto-Submitted', 'auto-generated');
                    $mail->setFrom($from_email, $from_display_name);
                    $mail->addAddress($to_email);
                    $mail->addReplyTo($email, $name); 
                    $mail->isHTML(true); 
                    $mail->Subject = $name . " - New Reflection Received";
                    $mail->Body    = $moderator_body;
                    $mail->send();

                    $confirmMail = new PHPMailer(true);
                    $confirmMail->isSMTP();
                    $confirmMail->Host       = $smtp_host;
                    $confirmMail->SMTPAuth   = true;
                    $confirmMail->Username   = $smtp_user;
                    $confirmMail->Password   = $smtp_pass;
                    $confirmMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $confirmMail->Port       = $smtp_port;
                    $confirmMail->CharSet    = 'UTF-8';

                    $confirmMail->addCustomHeader('Auto-Submitted', 'auto-generated');
                    $confirmMail->setFrom($from_email, $from_display_name);
                    $confirmMail->addAddress($email); 
                    $confirmMail->isHTML(true);
                    $confirmMail->Subject = "Reflection Received - Deoband Community Wikimedia";
                    $confirmMail->Body    = $submitter_body;
                    $confirmMail->send();

                    $message_sent = true;
                    write_audit_log("SUCCESS", $notification_id, $name, $email);
                    $_SESSION['form_token'] = bin2hex(random_bytes(32));
                    $name = $email = $reflection = "";
                } catch (Exception $e) {
                    $error_message = "Could not process delivery.";
                    write_audit_log("FAILED", $notification_id, $name, $email, $e->getMessage());
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCW@5 - Deoband Community Wikimedia</title>
    
<!-- SVG Favicon declaration -->
<link rel="icon" type="image/svg+xml" href="/reflections5/DCW%20logo.svg">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400;1,600&family=Segoe+UI:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://upload.wikimedia.org/wikipedia/commons/b/b9/Wikipedia_House_at_DCW_Train_a_Wikipedian_April_2026.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px 60px 20px;
            position: relative;
        }
        
        .wrapper { width: 100%; max-width: 1100px; }
        
        .site-header {
            text-align: center; margin-bottom: 25px; background: rgba(255, 255, 255, 0.88);
            padding: 20px 15px; border-radius: 8px; backdrop-filter: blur(4px);
            position: relative;
        }
        .site-header h1 {
            font-family: 'Playfair Display', Georgia, serif; font-style: italic; color: #2c3e50; font-size: 1.3rem;
            margin-top: 5px;
        }
        .nav-link {
            display: inline-block;
            font-size: 0.8rem;
            color: #4A90E2;
            text-decoration: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            transition: color 0.2s ease;
        }
        .nav-link:hover {
            color: #2b6cb0;
            text-decoration: underline;
        }
        
        .main-card {
            background: rgba(255, 255, 255, 0.94); padding: 35px 30px; border-radius: 12px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.2); backdrop-filter: blur(6px); margin-bottom: 25px;
            display: grid;
            grid-template-columns: 1fr 1.3fr 1fr;
            gap: 30px;
            align-items: start;
        }
        
        .highlight-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        .highlight-item {
            display: flex;
            flex-direction: column;
        }
        .highlight-title { 
            font-size: 0.8rem; color: #4a5568; font-weight: 600; margin-bottom: 8px; 
            text-transform: uppercase; letter-spacing: 0.8px; text-align: left;
        }
        
        /* Base Highlight Box Styles */
        .highlight-box {
            padding: 16px; 
            border-radius: 0 8px 8px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.03);
            border-left: 4px solid;
            transition: transform 0.2s ease;
        }
        .highlight-box:hover {
            transform: translateY(-2px);
        }
        
        /* Pastel Color Class Variations */
        .color-blue { 
            border-left-color: #3182ce; 
            background-color: #ebf8ff; 
        }
        .color-green { 
            border-left-color: #38a169; 
            background-color: #f0fff4; 
        }
        .color-purple { 
            border-left-color: #805ad5; 
            background-color: #faf5ff; 
        }
        .color-amber { 
            border-left-color: #dd6b20; 
            background-color: #fffaf0; 
        }

        .highlight-box p { font-size: 0.9rem; color: #4a5568; font-style: italic; line-height: 1.6; }
        .highlight-box .author { 
            font-style: normal; font-weight: 600; color: #2d3748; margin-top: 10px; 
            display: block; font-size: 0.85rem; 
        }

        .form-column {
            display: flex;
            flex-direction: column;
        }
        h2 { margin-bottom: 20px; color: #34495e; text-align: center; font-size: 1.25rem; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #4a5568; font-weight: 600; font-size: 0.85rem; }
        input[type="text"], input[type="email"], textarea {
            width: 100%; padding: 10px; border: 1px solid #cbd5e0; border-radius: 6px; font-size: 0.95rem;
            background-color: #ffffff;
        }
        textarea { resize: vertical; height: 110px; }
        button {
            width: 100%; padding: 12px; background-color: #4A90E2; color: white; border: none;
            border-radius: 6px; font-size: 0.95rem; font-weight: bold; cursor: pointer; margin-top: 5px;
        }
        button:hover { background-color: #357ABD; }
        .alert { padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 0.9rem; text-align: center; }
        .alert-success { background: #c6f6d5; color: #22543d; }
        .alert-danger { background: #fed7d7; color: #742a2a; }
        
        .site-footer {
            text-align: center; background: rgba(255, 255, 255, 0.88); padding: 12px; border-radius: 8px; width: 100%;
        }
        .site-footer p { font-family: 'Playfair Display', Georgia, serif; font-style: italic; color: #2c3e50; font-size: 1.05rem; }
        
        .bg-attribution {
            position: fixed;
            bottom: 12px;
            right: 12px;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.65);
            padding: 5px 10px;
            border-radius: 4px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            font-size: 0.7rem;
            color: #e2e8f0;
            letter-spacing: 0.4px;
            pointer-events: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        @media (max-width: 850px) {
            .main-card {
                grid-template-columns: 1fr;
                gap: 35px;
            }
            .highlight-container.left { order: 1; }
            .form-column { order: 2; }
            .highlight-container.right { order: 3; }
        }
    </style>
</head>
<body>

<div class="wrapper">
    <header class="site-header">
        <a href="https://dcwwiki.org" class="nav-link">← Go to Main website</a>
        <h1>Celebrating 5 Years of Deoband Community Wikimedia</h1>
    </header>

    <div class="main-card">
        
        <!-- LEFT COLUMN: FLUID HIGHLIGHTS WRAPPER -->
        <div class="highlight-container left">
            <?php if (!empty($left_reflections)): ?>
                <?php foreach ($left_reflections as $ref): ?>
                    <?php 
                        // Pull class dynamically and step our color tracker index forward safely
                        $current_color = $color_palette[$color_index % count($color_palette)];
                        $color_index++;
                    ?>
                    <div class="highlight-item">
                        <div class="highlight-title">Highlighted Reflection</div>
                        <div class="highlight-box <?php echo $current_color; ?>">
                            <p>"<?php echo $ref['text']; ?>"</p>
                            <span class="author">— <?php echo htmlspecialchars($ref['name']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </div>

        <!-- CENTER COLUMN: FORM ENGINE -->
        <div class="form-column">
            <h2>Share Your Reflection</h2>

            <?php if ($message_sent): ?>
                <div class="alert alert-success">Thank you! Your submission has been received.</div>
            <?php endif; ?>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="" method="POST">
                <input type="hidden" name="form_token" value="<?php echo htmlspecialchars($_SESSION['form_token']); ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="reflection">Your Reflection</label>
                    <textarea id="reflection" name="reflection" required></textarea>
                </div>
                <button type="submit">Submit Reflection</button>
            </form>
        </div>

        <!-- RIGHT COLUMN: FLUID HIGHLIGHTS WRAPPER -->
        <div class="highlight-container right">
            <?php if (!empty($right_reflections)): ?>
                <?php foreach ($right_reflections as $ref): ?>
                    <?php 
                        // Pull class dynamically and step our color tracker index forward safely
                        $current_color = $color_palette[$color_index % count($color_palette)];
                        $color_index++;
                    ?>
                    <div class="highlight-item">
                        <div class="highlight-title">Highlighted Reflection</div>
                        <div class="highlight-box <?php echo $current_color; ?>">
                            <p>"<?php echo $ref['text']; ?>"</p>
                            <span class="author">— <?php echo htmlspecialchars($ref['name']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </div>

    </div>

    <footer class="site-footer">
        <p>Celebrating 5 Years of Knowledge Activism</p>
    </footer>
</div>

<div class="bg-attribution">
    Background: ©Muntaqibah, CC BY-SA 4.0, Wikimedia Commons
</div>
</body>
</html>

