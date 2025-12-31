<?php
// Login Controller
require_once __DIR__ . '/../index.php';

class LoginController {
    private $login;

    public function __construct() {
        $this->login = new Login($GLOBALS['db']);
    }

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $result = $this->login->login($email, $password);

            if ($result['success']) {
                header('Location: ../views/home.php');
                exit();
            } else {
                return $result['message'];
            }
        }
        return null;
    }

    public function logout() {
        $this->login->logout();
        header('Location: ../views/login.php');
        exit();
    }

    public function isLoggedIn() {
        return $this->login->isLoggedIn();
    }

    public function getCurrentUser() {
        return $this->login->getCurrentUser();
    }
}
