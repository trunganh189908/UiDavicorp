<?php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'student_management');

// Application settings
define('APP_NAME', 'Student Management System');
define('APP_URL', 'http://localhost');
define('APP_DEBUG', true);

// Session settings
ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
