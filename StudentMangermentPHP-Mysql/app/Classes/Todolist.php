<?php

class Todolist {
    private $conn;
    private $table = 'todos';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createTodo($user_id, $title, $description = '', $priority = 'medium', $due_date = null) {
        $query = "INSERT INTO " . $this->table . " (user_id, title, description, priority, due_date, status, created_at) 
                  VALUES (?, ?, ?, ?, ?, 'pending', NOW())";
        
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            return ['success' => false, 'message' => 'Query preparation failed'];
        }

        $stmt->bind_param('issss', $user_id, $title, $description, $priority, $due_date);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Todo created successfully', 'id' => $stmt->insert_id];
        }

        return ['success' => false, 'message' => 'Failed to create todo'];
    }

    public function getTodosByUser($user_id, $status = null) {
        if ($status) {
            $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? AND status = ? ORDER BY due_date ASC, priority DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('is', $user_id, $status);
        } else {
            $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? ORDER BY due_date ASC, priority DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i', $user_id);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTodoById($todo_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $todo_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateTodo($todo_id, $title, $description, $priority, $due_date) {
        $query = "UPDATE " . $this->table . " SET title = ?, description = ?, priority = ?, due_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssi', $title, $description, $priority, $due_date, $todo_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Todo updated successfully'];
        }

        return ['success' => false, 'message' => 'Failed to update todo'];
    }

    public function updateTodoStatus($todo_id, $status) {
        $query = "UPDATE " . $this->table . " SET status = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $status, $todo_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Todo status updated successfully'];
        }

        return ['success' => false, 'message' => 'Failed to update todo status'];
    }

    public function deleteTodo($todo_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $todo_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Todo deleted successfully'];
        }

        return ['success' => false, 'message' => 'Failed to delete todo'];
    }

    public function getTodoStats($user_id) {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
                    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed
                  FROM " . $this->table . " WHERE user_id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
