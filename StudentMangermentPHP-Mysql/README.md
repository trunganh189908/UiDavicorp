# Student Management System

A PHP-based student management application with MySQL database for managing schedules, notes, and todos.

## Features

- **Login & Register**: User authentication and registration system
- **Schedule Management**: Create, view, and manage class schedules
- **Notes**: Take and organize notes by category
- **Todo List**: Manage tasks with priority levels and due dates
- **User Dashboard**: Central hub to manage all features

## Folder Structure

```
StudentMangermentPHP-Mysql/
├── app/
│   ├── Classes/           # Core business logic classes
│   │   ├── Login.php      # Authentication
│   │   ├── Register.php   # User registration
│   │   ├── Schedule.php   # Schedule management
│   │   ├── Note.php       # Note management
│   │   └── Todolist.php   # Todo management
│   ├── Controllers/       # Request handlers
│   └── Models/           # Data models
├── config/
│   ├── config.php        # Application configuration
│   └── Database.php      # Database connection
├── public/               # Public assets
├── views/                # View templates
├── assets/
│   ├── css/              # Stylesheets
│   └── js/               # JavaScript files
├── database.sql          # Database schema
└── index.php             # Entry point
```

## Installation

1. **Create Database**: Import `database.sql` to MySQL
2. **Configure Database**: Update credentials in `config/Database.php`
3. **Set Up Server**: Place project in web server root
4. **Access Application**: Navigate to application URL

## Database Configuration

Update `config/Database.php` with your MySQL credentials:

```php
private $host = 'localhost';
private $db_name = 'student_management';
private $user = 'root';
private $password = '';
```

## Usage

### Login
```php
$database = new Database();
$db = $database->connect();
$login = new Login($db);
$result = $login->login('user@email.com', 'password');
```

### Register
```php
$register = new Register($db);
$result = $register->register('John Doe', 'john@email.com', 'password', 'password');
```

### Manage Schedules
```php
$schedule = new Schedule($db);
$result = $schedule->createSchedule($user_id, 'Math 101', 'Monday', '10:00', 'Room 101');
$schedules = $schedule->getSchedulesByUser($user_id);
```

### Manage Notes
```php
$note = new Note($db);
$result = $note->createNote($user_id, 'Title', 'Content', 'category');
$notes = $note->getNotesByUser($user_id);
```

### Manage Todos
```php
$todo = new Todolist($db);
$result = $todo->createTodo($user_id, 'Task Title', 'Description', 'high', '2025-12-31');
$todos = $todo->getTodosByUser($user_id);
```

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Web Server (Apache/Nginx)

## Security Features

- Password hashing with PHP's `password_hash()`
- Prepared statements to prevent SQL injection
- Email validation
- Session management

## Future Enhancements

- Email verification
- Password reset functionality
- Role-based access control
- API endpoints
- Dashboard analytics
