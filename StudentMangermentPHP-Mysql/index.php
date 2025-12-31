<?php
// Main entry point - Initialize and autoload classes

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/Database.php';

// Autoload classes
spl_autoload_register(function($class) {
    $paths = [
        __DIR__ . '/app/Classes/',
        __DIR__ . '/app/Controllers/',
        __DIR__ . '/app/Models/'
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Initialize database
$database = new Database();
$db = $database->connect();

// Make classes available globally
$GLOBALS['db'] = $db;
