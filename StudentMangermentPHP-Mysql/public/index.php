<?php
// Public entry point - Redirect to login if not logged in
session_start();
require_once __DIR__ . '/../app/Controllers/LoginController.php';

$loginController = new LoginController();

if ($loginController->isLoggedIn()) {
    header('Location: ../views/home.php');
} else {
    header('Location: ../views/login.php');
}
exit();
