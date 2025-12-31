<?php
// Todolist Controller
require_once __DIR__ . '/../index.php';

class TodolistController {
    private $todolist;

    public function __construct() {
        $this->todolist = new Todolist($GLOBALS['db']);
    }

    public function createTodo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'] ?? null;
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $priority = $_POST['priority'] ?? 'medium';
            $due_date = $_POST['due_date'] ?? null;

            if (!$user_id) {
                return ['success' => false, 'message' => 'User not logged in'];
            }

            return $this->todolist->createTodo($user_id, $title, $description, $priority, $due_date);
        }
        return null;
    }

    public function getTodos($status = null) {
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            return [];
        }
        return $this->todolist->getTodosByUser($user_id, $status);
    }

    public function getTodoById($todo_id) {
        return $this->todolist->getTodoById($todo_id);
    }

    public function updateTodo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $todo_id = $_POST['todo_id'] ?? null;
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $priority = $_POST['priority'] ?? 'medium';
            $due_date = $_POST['due_date'] ?? null;

            return $this->todolist->updateTodo($todo_id, $title, $description, $priority, $due_date);
        }
        return null;
    }

    public function updateTodoStatus($todo_id, $status) {
        return $this->todolist->updateTodoStatus($todo_id, $status);
    }

    public function deleteTodo($todo_id) {
        return $this->todolist->deleteTodo($todo_id);
    }

    public function getTodoStats() {
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            return [];
        }
        return $this->todolist->getTodoStats($user_id);
    }
}
