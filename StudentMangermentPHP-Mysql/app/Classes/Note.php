<?php

class Note {
    private $conn;
    private $table = 'notes';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createNote($user_id, $title, $content, $category = 'general') {
        $query = "INSERT INTO " . $this->table . " (user_id, title, content, category, created_at, updated_at) 
                  VALUES (?, ?, ?, ?, NOW(), NOW())";
        
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            return ['success' => false, 'message' => 'Query preparation failed'];
        }

        $stmt->bind_param('isss', $user_id, $title, $content, $category);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Note created successfully', 'id' => $stmt->insert_id];
        }

        return ['success' => false, 'message' => 'Failed to create note'];
    }

    public function getNotesByUser($user_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNoteById($note_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $note_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateNote($note_id, $title, $content, $category) {
        $query = "UPDATE " . $this->table . " SET title = ?, content = ?, category = ?, updated_at = NOW() WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssi', $title, $content, $category, $note_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Note updated successfully'];
        }

        return ['success' => false, 'message' => 'Failed to update note'];
    }

    public function deleteNote($note_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $note_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Note deleted successfully'];
        }

        return ['success' => false, 'message' => 'Failed to delete note'];
    }

    public function searchNotes($user_id, $keyword) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? AND (title LIKE ? OR content LIKE ?) ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $keyword_pattern = '%' . $keyword . '%';
        $stmt->bind_param('iss', $user_id, $keyword_pattern, $keyword_pattern);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
