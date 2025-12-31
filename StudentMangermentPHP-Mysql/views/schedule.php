<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
    session_start();
    require_once __DIR__ . '/../app/Controllers/LoginController.php';
    require_once __DIR__ . '/../app/Controllers/ScheduleController.php';
    
    $loginController = new LoginController();
    
    // Check if user is logged in
    if (!$loginController->isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
    
    $user = $loginController->getCurrentUser();
    $scheduleController = new ScheduleController();
    
    // Handle create/update
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'create') {
            $result = $scheduleController->createSchedule();
            if ($result && $result['success']) {
                header('Location: schedule.php?success=' . urlencode($result['message']));
                exit();
            }
        } elseif ($_POST['action'] === 'update') {
            $result = $scheduleController->updateSchedule();
            if ($result && $result['success']) {
                header('Location: schedule.php?success=' . urlencode($result['message']));
                exit();
            }
        }
    }
    
    // Handle delete
    if (isset($_GET['delete'])) {
        $result = $scheduleController->deleteSchedule($_GET['delete']);
        if ($result && $result['success']) {
            header('Location: schedule.php?success=' . urlencode($result['message']));
            exit();
        }
    }
    
    $schedules = $scheduleController->getSchedules();
    ?>

    <!-- Navigation Menu -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>Student Management</h2>
            </div>
            <ul class="nav-menu">
                <li><a href="home.php" class="nav-link">Dashboard</a></li>
                <li><a href="schedule.php" class="nav-link active">Schedule</a></li>
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
        <div class="page-header">
            <h1>Class Schedule</h1>
            <button class="btn btn-primary" onclick="openScheduleModal()">Add New Schedule</button>
        </div>

        <?php
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
        }
        ?>

        <div class="schedule-grid">
            <?php if (empty($schedules)): ?>
                <p class="no-data">No schedules yet. Click "Add New Schedule" to create one.</p>
            <?php else: ?>
                <?php foreach ($schedules as $schedule): ?>
                    <div class="schedule-card">
                        <div class="schedule-header">
                            <h3><?php echo htmlspecialchars($schedule['course_name']); ?></h3>
                            <div class="schedule-actions">
                                <button class="btn-icon" onclick="editSchedule(<?php echo $schedule['id']; ?>)">✎</button>
                                <a href="?delete=<?php echo $schedule['id']; ?>" class="btn-icon" onclick="return confirm('Delete this schedule?');">✕</a>
                            </div>
                        </div>
                        <div class="schedule-body">
                            <p><strong>Day:</strong> <?php echo htmlspecialchars($schedule['day']); ?></p>
                            <p><strong>Time:</strong> <?php echo htmlspecialchars($schedule['time']); ?></p>
                            <p><strong>Location:</strong> <?php echo htmlspecialchars($schedule['location']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Add/Edit Schedule Modal -->
    <div id="scheduleModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeScheduleModal()">&times;</span>
            <h2>Add New Schedule</h2>
            <form method="POST" class="form">
                <input type="hidden" name="action" value="create">
                <input type="hidden" id="schedule_id" name="schedule_id">
                
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" id="course_name" name="course_name" required>
                </div>

                <div class="form-group">
                    <label for="day">Day</label>
                    <select id="day" name="day" required>
                        <option value="">Select a day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="location">Location/Room</label>
                    <input type="text" id="location" name="location" required>
                </div>

                <button type="submit" class="btn btn-primary">Save Schedule</button>
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

    <script src="../assets/js/schedule.js"></script>
</body>
</html>
