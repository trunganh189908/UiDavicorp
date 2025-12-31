<!-- Quick Start Guide - Quick Reference -->

# 🚀 Quick Start - Student Management System

## ⚡ 5-Minute Setup

### 1. Create Database (30 seconds)
```bash
mysql -u root -p -e "CREATE DATABASE student_management;"
mysql -u root -p student_management < database.sql
```

### 2. Configure Database (1 minute)
Edit `config/Database.php`:
```php
private $host = 'localhost';
private $db_name = 'student_management';
private $user = 'root';
private $password = '';
```

### 3. Start Server (1 minute)
```bash
cd /Users/trung/StudentMangermentPHP-Mysql
php -S localhost:8000 -t public/
```

### 4. Access Application (30 seconds)
Open: `http://localhost:8000`

### 5. First User (2 minutes)
1. Click "Register here"
2. Create test account (Name, Email, Password)
3. Login with credentials
4. Start using!

---

## 📊 Application Structure

```
Register/Login → Home Page → {Schedule | Notes | Todos} → Logout
```

---

## 🎯 User Roles & Pages

| Page | Purpose | Access |
|------|---------|--------|
| **login.php** | User authentication | Public |
| **register.php** | Create account | Public |
| **home.php** | Dashboard | Logged in users |
| **schedule.php** | Manage classes | Logged in users |
| **note.php** | Take notes | Logged in users |
| **todolist.php** | Manage tasks | Logged in users |
| **profile.php** | User info | Logged in users |
| **logout.php** | End session | Logged in users |

---

## 📁 Key Files

### Classes (Business Logic)
- `app/Classes/Login.php` - Authentication
- `app/Classes/Register.php` - Registration
- `app/Classes/Schedule.php` - Schedule CRUD
- `app/Classes/Note.php` - Notes CRUD
- `app/Classes/Todolist.php` - Todos CRUD

### Controllers (Request Handlers)
- `app/Controllers/LoginController.php`
- `app/Controllers/RegisterController.php`
- `app/Controllers/ScheduleController.php`
- `app/Controllers/NoteController.php`
- `app/Controllers/TodolistController.php`

### Views (HTML Pages)
- `views/login.php` - Login form
- `views/register.php` - Register form
- `views/home.php` - Dashboard
- `views/schedule.php` - Schedule management
- `views/note.php` - Notes management
- `views/todolist.php` - Todo management
- `views/profile.php` - User profile
- `views/logout.php` - Logout handler

### Styling & JavaScript
- `assets/css/style.css` - All styles (responsive)
- `assets/js/schedule.js` - Schedule interactions
- `assets/js/note.js` - Notes interactions
- `assets/js/todolist.js` - Todo interactions

### Configuration
- `config/Database.php` - DB connection
- `config/config.php` - App settings
- `database.sql` - Database schema

---

## 🔑 Key Features

### ✅ Authentication
- Register with email validation
- Secure login with password hashing
- Session-based authentication
- Logout functionality

### ✅ Dashboard
- Welcome greeting
- Quick access cards (Schedule, Notes, Todos)
- Navigation menu
- University info footer

### ✅ Schedule Management
- Add/Edit/Delete schedules
- Organize by day and time
- View all schedules in grid
- Modal form interface

### ✅ Notes Management
- Create categorized notes
- 5 categories: General, Lecture, Assignment, Study, Research
- View notes as cards
- Edit/Delete/View notes
- Search functionality

### ✅ Todo List Management
- Create tasks with priority
- Set due dates
- Mark complete/incomplete
- View statistics
- Color-coded priorities
- Edit/Delete tasks

---

## 🔒 Security

✅ Password hashing (bcrypt)
✅ Prepared statements (SQL injection prevention)
✅ Input validation & sanitization
✅ XSS prevention (htmlspecialchars)
✅ Session management
✅ Cascading deletes

---

## 📱 Responsive Design

- **Desktop** (1200px+)
- **Tablet** (768px-1199px)
- **Mobile** (480px-767px)
- **Small Mobile** (<480px)

---

## 🎨 UI Colors

- **Primary**: #3498db (Blue)
- **Secondary**: #2ecc71 (Green)
- **Danger**: #e74c3c (Red)
- **Warning**: #f39c12 (Orange)

---

## 📊 Database Tables

1. **users** - Student accounts
2. **schedules** - Class schedules
3. **notes** - Student notes
4. **todos** - Task lists

All tables linked with Foreign Keys (user_id)

---

## 🧪 Test Workflow

1. **Register** → Create test account
2. **Login** → Access dashboard
3. **Schedule** → Add 2-3 classes
4. **Notes** → Create notes in different categories
5. **Todos** → Add tasks with different priorities
6. **Edit/Delete** → Test CRUD operations
7. **Logout** → End session

---

## ⚙️ Configuration

### Database Connection
File: `config/Database.php`
```php
$host = 'localhost';
$db_name = 'student_management';
$user = 'root';
$password = '';
```

### App Settings
File: `config/config.php`
```php
define('DB_HOST', 'localhost');
define('APP_NAME', 'Student Management System');
define('APP_DEBUG', true);
```

---

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| "Connection failed" | Check MySQL is running, verify credentials |
| "Page not found" | Ensure server is running on correct port |
| "CSS/JS not loading" | Check paths, clear cache |
| "Can't login" | Check database imported, user registered |
| "Session not working" | Clear cookies, check session config |

---

## 📚 Development Tips

### Add New Feature
1. Create class in `app/Classes/`
2. Create controller in `app/Controllers/`
3. Create view in `views/`
4. Add route/link in navigation
5. Style with CSS

### Debug
- Check browser console (F12)
- Look at PHP errors in terminal
- Check MySQL with phpMyAdmin
- Use `var_dump()` or `echo` for debugging

### Deploy
1. Update `config/config.php` for production
2. Change `APP_DEBUG` to false
3. Use strong database credentials
4. Enable HTTPS on server
5. Regular backups

---

## 📞 Support Resources

- **PHP Docs**: https://www.php.net/
- **MySQL Docs**: https://dev.mysql.com/doc/
- **Security**: https://owasp.org/
- **Web Standards**: https://developer.mozilla.org/

---

## 🎓 Learning Objectives

By building this system, you'll learn:

✅ PHP basics (classes, OOP, sessions)
✅ MySQL database design & operations
✅ CRUD operations
✅ Form handling & validation
✅ Security best practices
✅ Responsive web design
✅ Authentication systems
✅ MVC architecture basics

---

## ✨ What's Included

✅ 5 Core Classes
✅ 5 Controllers
✅ 8 View Pages
✅ Complete CSS (responsive)
✅ JavaScript interactions
✅ MySQL database schema
✅ Full documentation
✅ Security features
✅ User authentication
✅ CRUD operations

---

## 🚀 Next Steps

1. ✅ Setup database and server
2. ✅ Create test account
3. ✅ Explore all features
4. ✅ Test CRUD operations
5. ✅ Customize styling
6. ✅ Add more features
7. ✅ Deploy to production

---

**You're all set! Start building! 🎉**
