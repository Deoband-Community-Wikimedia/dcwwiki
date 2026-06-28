<?php
// Custom Autoloader (Fallback when Composer is not available)

// 1. Include TCPDF directly
if (file_exists(__DIR__ . '/TCPDF-main/tcpdf.php')) {
    require_once __DIR__ . '/TCPDF-main/tcpdf.php';
}

// 2. Setup PSR-4 autoloader for FPDI
spl_autoload_register(function ($class) {
    // FPDI namespace prefix
    $prefix = 'setasign\\Fpdi\\';

    // base directory for the FPDI src folder
    $base_dir = __DIR__ . '/FPDI-2.6.0/src/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // map to file path
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
