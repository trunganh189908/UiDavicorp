<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
    session_start();
    require_once __DIR__ . '/../app/Controllers/LoginController.php';
    require_once __DIR__ . '/../app/Controllers/TodolistController.php';
    
    $loginController = new LoginController();
    
    // Check if user is logged in
    if (!$loginController->isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
    
    $user = $loginController->getCurrentUser();
    $todoController = new TodolistController();
    
    // Handle create
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $result = $todoController->createTodo();
            if ($result && $result['success']) {
                header('Location: todolist.php?success=' . urlencode($result['message']));
                exit();
            }
        } elseif ($_POST['action'] === 'update') {
            $result = $todoController->updateTodo();
            if ($result && $result['success']) {
                header('Location: todolist.php?success=' . urlencode($result['message']));
                exit();
            }
        }
    }
    
    // Handle status update
    if (isset($_GET['toggle'])) {
        $todo = $todoController->getTodoById($_GET['toggle']);
        $newStatus = $todo['status'] === 'pending' ? 'completed' : 'pending';
        $result = $todoController->updateTodoStatus($_GET['toggle'], $newStatus);
        if ($result && $result['success']) {
            header('Location: todolist.php?success=' . urlencode($result['message']));
            exit();
        }
    }
    
    // Handle delete
    if (isset($_GET['delete'])) {
        $result = $todoController->deleteTodo($_GET['delete']);
        if ($result && $result['success']) {
            header('Location: todolist.php?success=' . urlencode($result['message']));
            exit();
        }
    }
    
    $todos = $todoController->getTodos();
    $stats = $todoController->getTodoStats();
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
                <li><a href="note.php" class="nav-link">Notes</a></li>
                <li><a href="todolist.php" class="nav-link active">Todo List</a></li>
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
            <h1>My Todo List</h1>
            <button class="btn btn-primary" onclick="openTodoModal()">Add New Todo</button>
        </div>

        <?php
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
        }
        ?>

        <!-- Stats -->
        <div class="stats-container">
            <div class="stat-item">
                <span class="stat-label">Total Tasks</span>
                <span class="stat-value"><?php echo $stats['total'] ?? 0; ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Pending</span>
                <span class="stat-value"><?php echo $stats['pending'] ?? 0; ?></span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Completed</span>
                <span class="stat-value"><?php echo $stats['completed'] ?? 0; ?></span>
            </div>
        </div>

        <div class="todos-container">
            <?php if (empty($todos)): ?>
                <p class="no-data">No todos yet. Click "Add New Todo" to create one.</p>
            <?php else: ?>
                <?php foreach ($todos as $todo): ?>
                    <div class="todo-item <?php echo $todo['status'] === 'completed' ? 'completed' : ''; ?>">
                        <div class="todo-content">
                            <input type="checkbox" class="todo-checkbox" 
                                   <?php echo $todo['status'] === 'completed' ? 'checked' : ''; ?>
                                   onchange="toggleTodo(<?php echo $todo['id']; ?>)">
                            <div class="todo-text">
                                <h3><?php echo htmlspecialchars($todo['title']); ?></h3>
                                <?php if ($todo['description']): ?>
                                    <p><?php echo htmlspecialchars($todo['description']); ?></p>
                                <?php endif; ?>
                                <div class="todo-meta">
                                    <span class="priority priority-<?php echo $todo['priority']; ?>">
                                        <?php echo ucfirst($todo['priority']); ?> Priority
                                    </span>
                                    <?php if ($todo['due_date']): ?>
                                        <span class="due-date">Due: <?php echo date('M d, Y', strtotime($todo['due_date'])); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="todo-actions">
                            <button class="btn-icon" onclick="editTodo(<?php echo $todo['id']; ?>)">✎</button>
                            <a href="?delete=<?php echo $todo['id']; ?>" class="btn-icon" onclick="return confirm('Delete this todo?');">✕</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Add/Edit Todo Modal -->
    <div id="todoModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeTodoModal()">&times;</span>
            <h2>Add New Todo</h2>
            <form method="POST" class="form">
                <input type="hidden" name="action" value="create">
                <input type="hidden" id="todo_id" name="todo_id">
                
                <div class="form-group">
                    <label for="title">Task Title</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <select id="priority" name="priority">
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" id="due_date" name="due_date">
                </div>

                <button type="submit" class="btn btn-primary">Save Todo</button>
            </form>
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

    <script src="../assets/js/todolist.js"></script>
</body>
</html>
