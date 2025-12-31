<?php

class Database {
    private $host = 'localhost';
    private $db_name = 'student_management';
    private $user = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->db_name
        );

        // Check connection
        if ($this->conn->connect_error) {
            die('Database connection failed: ' . $this->conn->connect_error);
        }

        return $this->conn;
    }

    public function getConnection() {
        return $this->conn;
    }
}
