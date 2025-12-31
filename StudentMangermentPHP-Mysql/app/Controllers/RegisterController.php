<?php
// Register Controller
require_once __DIR__ . '/../index.php';

class RegisterController {
    private $register;

    public function __construct() {
        $this->register = new Register($GLOBALS['db']);
    }

    public function handleRegister() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            $result = $this->register->register($name, $email, $password, $confirm_password);

            return $result;
        }
        return null;
    }
}
