<?php
// Note Controller
require_once __DIR__ . '/../index.php';

class NoteController {
    private $note;

    public function __construct() {
        $this->note = new Note($GLOBALS['db']);
    }

    public function createNote() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'] ?? null;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category = $_POST['category'] ?? 'general';

            if (!$user_id) {
                return ['success' => false, 'message' => 'User not logged in'];
            }

            return $this->note->createNote($user_id, $title, $content, $category);
        }
        return null;
    }

    public function getNotes() {
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            return [];
        }
        return $this->note->getNotesByUser($user_id);
    }

    public function getNoteById($note_id) {
        return $this->note->getNoteById($note_id);
    }

    public function updateNote() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $note_id = $_POST['note_id'] ?? null;
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $category = $_POST['category'] ?? 'general';

            return $this->note->updateNote($note_id, $title, $content, $category);
        }
        return null;
    }

    public function deleteNote($note_id) {
        return $this->note->deleteNote($note_id);
    }

    public function searchNotes($keyword) {
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            return [];
        }
        return $this->note->searchNotes($user_id, $keyword);
    }
}
