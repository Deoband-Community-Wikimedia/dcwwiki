<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define explicit font path to avoid Linux path resolution bugs
define('K_PATH_FONTS', __DIR__ . '/vendor/TCPDF-main/fonts/');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

require_once 'config.php';
require_once 'vendor/autoload.php';

use setasign\Fpdi\Tcpdf\Fpdi;

$fullName = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');

if (!$fullName || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die(header("Location: index.php?error=Invalid+input"));
}

// Optimized DB check: only query for existence (SELECT 1) rather than fetching all fields
$stmt = $pdo->prepare("SELECT 1 FROM wikiversary2026_participants WHERE full_name = ? AND email = ?");
$stmt->execute([$fullName, $email]);

if (!$stmt->fetchColumn()) {
    die(header("Location: index.php?error=Verification+failed"));
}

// Generate PDF
$pdf = new Fpdi('L', 'mm', 'A4');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Chained methods to load and import the template in one line
$pdf->useTemplate($pdf->importPage($pdf->setSourceFile(__DIR__ . '/templates/certificate_template.pdf')));

// Use the pre-compiled font (already exists in vendor/TCPDF-main/fonts/alexbrush.php)
$fontName = 'alexbrush';

$pdf->SetFont($fontName, '', 37);
$pdf->SetTextColor(44, 59, 165);

// Positioning
$pdf->SetY(88);
$pdf->SetX(120);
$pdf->Cell(0, 10, $fullName, 0, 1, 'C'); // 'C' aligns to the left so it only grows rightwards

// Format safe filename and force download
$filename = "Wikiversary-" . preg_replace('/[^a-z0-9]+/', '-', strtolower($fullName)) . ".pdf";
$pdf->Output($filename, 'D');
