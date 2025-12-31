<?php
// Logout handler
session_start();
require_once __DIR__ . '/../app/Controllers/LoginController.php';

$controller = new LoginController();
$controller->logout();
?>
