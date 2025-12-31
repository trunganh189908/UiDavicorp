<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Student Management System</title>
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
                <li><a href="home.php" class="nav-link">Dashboard</a></li>
                <li><a href="schedule.php" class="nav-link">Schedule</a></li>
                <li><a href="note.php" class="nav-link">Notes</a></li>
                <li><a href="todolist.php" class="nav-link">Todo List</a></li>
                <li><a href="profile.php" class="nav-link active">Profile</a></li>
            </ul>
            <div class="nav-user">
                <span class="user-name"><?php echo htmlspecialchars($user['name']); ?></span>
                <a href="logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="profile-container">
            <div class="profile-card">
                <div class="profile-avatar">
                    <div class="avatar-circle"><?php echo strtoupper(substr($user['name'], 0, 1)); ?></div>
                </div>
                <div class="profile-info">
                    <h1><?php echo htmlspecialchars($user['name']); ?></h1>
                    <p><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>

            <div class="profile-section">
                <h2>Account Information</h2>
                <div class="profile-details">
                    <div class="detail-row">
                        <span class="detail-label">Full Name:</span>
                        <span class="detail-value"><?php echo htmlspecialchars($user['name']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value"><?php echo htmlspecialchars($user['email']); ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">User ID:</span>
                        <span class="detail-value"><?php echo $user['id']; ?></span>
                    </div>
                </div>
            </div>

            <div class="profile-actions">
                <button class="btn btn-secondary">Edit Profile</button>
                <button class="btn btn-secondary">Change Password</button>
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
</body>
</html>
