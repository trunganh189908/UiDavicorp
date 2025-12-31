<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
    session_start();
    require_once __DIR__ . '/../app/Controllers/LoginController.php';
    
    $loginController = new LoginController();
    
    // Check if user is logged in
    if (!$loginController->isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
    
    $user = $loginController->getCurrentUser();
    ?>

    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>Student Management</h2>
            </div>
            <ul class="nav-menu">
                <li><a href="home.php" class="nav-link active">Dashboard</a></li>
                <li><a href="schedule.php" class="nav-link">Schedule</a></li>
                <li><a href="note.php" class="nav-link">Notes</a></li>
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
        <div class="dashboard-content">
            <div class="welcome-section">
                <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
                <p>This is your student management dashboard.</p>
            </div>

            <div class="dashboard-cards">
                <div class="card card-schedule">
                    <div class="card-icon">📅</div>
                    <h3>Schedule</h3>
                    <p>Manage your class schedules and timetable</p>
                    <a href="schedule.php" class="card-link">View Schedules →</a>
                </div>

                <div class="card card-notes">
                    <div class="card-icon">📝</div>
                    <h3>Notes</h3>
                    <p>Take and organize your study notes</p>
                    <a href="note.php" class="card-link">View Notes →</a>
                </div>

                <div class="card card-todo">
                    <div class="card-icon">✓</div>
                    <h3>Todo List</h3>
                    <p>Manage your tasks and assignments</p>
                    <a href="todolist.php" class="card-link">View Todos →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- University Information Footer -->
    <footer class="university-footer">
        <div class="footer-container">
            <div class="footer-section">
                <h4>University Information</h4>
                <p><strong>Name:</strong> Your University Name</p>
                <p><strong>Location:</strong> City, Country</p>
                <p><strong>Established:</strong> Year</p>
            </div>
            <div class="footer-section">
                <h4>Contact</h4>
                <p><strong>Email:</strong> info@university.edu</p>
                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                <p><strong>Website:</strong> www.university.edu</p>
            </div>
            <div class="footer-section">
                <h4>Address</h4>
                <p>123 University Avenue</p>
                <p>Campus City, State 12345</p>
                <p>USA</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Student Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
