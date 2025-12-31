<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <h1>Student Login</h1>
            
            <?php
            session_start();
            require_once __DIR__ . '/../app/Controllers/LoginController.php';
            
            $controller = new LoginController();
            $error = $controller->handleLogin();
            
            if ($error) {
                echo '<div class="alert alert-error">' . htmlspecialchars($error) . '</div>';
            }
            
            if (isset($_GET['registered'])) {
                echo '<div class="alert alert-success">Registration successful! Please login.</div>';
            }
            ?>
            
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>

            <p class="auth-footer">
                Don't have an account? <a href="register.php">Register here</a>
            </p>
        </div>
    </div>
</body>
</html>
