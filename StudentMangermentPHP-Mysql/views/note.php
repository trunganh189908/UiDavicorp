<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
    session_start();
    require_once __DIR__ . '/../app/Controllers/LoginController.php';
    require_once __DIR__ . '/../app/Controllers/NoteController.php';
    
    $loginController = new LoginController();
    
    // Check if user is logged in
    if (!$loginController->isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
    
    $user = $loginController->getCurrentUser();
    $noteController = new NoteController();
    
    // Handle create
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $result = $noteController->createNote();
            if ($result && $result['success']) {
                header('Location: note.php?success=' . urlencode($result['message']));
                exit();
            }
        } elseif ($_POST['action'] === 'update') {
            $result = $noteController->updateNote();
            if ($result && $result['success']) {
                header('Location: note.php?success=' . urlencode($result['message']));
                exit();
            }
        }
    }
    
    // Handle delete
    if (isset($_GET['delete'])) {
        $result = $noteController->deleteNote($_GET['delete']);
        if ($result && $result['success']) {
            header('Location: note.php?success=' . urlencode($result['message']));
            exit();
        }
    }
    
    $notes = $noteController->getNotes();
    ?>

    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>Student Management</h2>
            </div>
            <ul class="nav-menu">
                <li><a href="home.php" class="nav-link">Dashboard</a></li>
                <li><a href="schedule.php" class="nav-link">Schedule</a></li>
                <li><a href="note.php" class="nav-link active">Notes</a></li>
                <li><a href="todolist.php" class="nav-link">Todo List</a></li>
                <li><a href="profile.php" class="nav-link">Profile</a></li>
            </ul>
            <div class="nav-user">
                <span class="user-name"><?php echo htmlspecialchars($user['name']); ?></span>
                <a href="logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="page-header">
            <h1>My Notes</h1>
            <button class="btn btn-primary" onclick="openNoteModal()">Create New Note</button>
        </div>

        <?php
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
        }
        ?>

        <div class="notes-grid">
            <?php if (empty($notes)): ?>
                <p class="no-data">No notes yet. Click "Create New Note" to start taking notes.</p>
            <?php else: ?>
                <?php foreach ($notes as $note): ?>
                    <div class="note-card">
                        <div class="note-header">
                            <h3><?php echo htmlspecialchars($note['title']); ?></h3>
                            <span class="note-category"><?php echo htmlspecialchars($note['category']); ?></span>
                        </div>
                        <div class="note-body">
                            <p><?php echo substr(htmlspecialchars($note['content']), 0, 150) . '...'; ?></p>
                        </div>
                        <div class="note-footer">
                            <small><?php echo date('M d, Y', strtotime($note['created_at'])); ?></small>
                            <div class="note-actions">
                                <button class="btn-icon" onclick="editNote(<?php echo $note['id']; ?>)">✎</button>
                                <button class="btn-icon" onclick="viewNote(<?php echo $note['id']; ?>)">👁</button>
                                <a href="?delete=<?php echo $note['id']; ?>" class="btn-icon" onclick="return confirm('Delete this note?');">✕</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Add/Edit Note Modal -->
    <div id="noteModal" class="modal">
        <div class="modal-content modal-large">
            <span class="modal-close" onclick="closeNoteModal()">&times;</span>
            <h2>Create New Note</h2>
            <form method="POST" class="form">
                <input type="hidden" name="action" value="create">
                <input type="hidden" id="note_id" name="note_id">
                
                <div class="form-group">
                    <label for="title">Note Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="general">General</option>
                        <option value="lecture">Lecture</option>
                        <option value="assignment">Assignment</option>
                        <option value="study">Study</option>
                        <option value="research">Research</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" rows="10" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save Note</button>
            </form>
        </div>
    </div>

    <!-- View Note Modal -->
    <div id="viewNoteModal" class="modal">
        <div class="modal-content modal-large">
            <span class="modal-close" onclick="closeViewNoteModal()">&times;</span>
            <div id="viewNoteContent"></div>
        </div>
    </div>

    <!-- University Information Footer -->
    <footer class="university-footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>University Information</h4>
                <p><strong>Name:</strong> Your University Name</p>
                <p><strong>Location:</strong> City, Country</p>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p><strong>Email:</strong> info@university.edu</p>
                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
            </div>
            <div class="footer-section">
                <h4>Address</h4>
                <p>123 University Avenue, Campus City</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Student Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="../assets/js/note.js"></script>
</body>
</html>
