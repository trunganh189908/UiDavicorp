<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <h1>Student Registration</h1>
            
            <?php
            session_start();
            require_once __DIR__ . '/../app/Controllers/RegisterController.php';
            
            $controller = new RegisterController();
            $result = $controller->handleRegister();
            
            if ($result && !$result['success']) {
                echo '<div class="alert alert-error">' . htmlspecialchars($result['message']) . '</div>';
            }
            
            if ($result && $result['success']) {
                echo '<div class="alert alert-success">' . htmlspecialchars($result['message']) . '</div>';
                header('Refresh: 2; url=login.php?registered=true');
            }
            ?>
            
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password (min 6 characters)">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>

            <p class="auth-footer">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </div>
    </div>
</body>
</html>
