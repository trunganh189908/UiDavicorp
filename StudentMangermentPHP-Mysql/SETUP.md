# Student Management System - Complete Setup Guide

## 🎓 Application Overview

This is a complete PHP-based Student Management System with the following workflow:

### User Journey
```
Register → Login → Home Page (Dashboard) → Schedule/Notes/Todos Management
```

---

## 📋 Features

### ✅ Authentication System
- Student Registration with validation
- Secure Login with password hashing
- Session-based authentication
- Logout functionality

### ✅ Dashboard (Home Page)
- Welcome message with student name
- Quick access cards for all features
- University information footer
- Navigation menu at the top

### ✅ Schedule Management Page
- Create and manage class schedules
- Organize by day, time, and location
- View all schedules in a clean grid format
- Edit and delete schedules
- Add new schedule via modal

### ✅ Notes Management Page
- Create detailed notes with categories
- Organize notes (Lecture, Assignment, Study, Research, General)
- View notes in card format
- Edit and delete notes
- Category filtering with badges

### ✅ Todo List Management Page
- Create tasks with priority levels (Low, Medium, High)
- Set due dates for tasks
- Track completion status with checkboxes
- View statistics (Total, Pending, Completed)
- Edit and delete tasks
- Priority color coding

### ✅ Responsive Design
- Mobile-friendly interface
- Desktop, tablet, and mobile optimization
- Clean and modern UI
- Smooth animations and transitions

---

## 📁 Complete Folder Structure

```
StudentMangermentPHP-Mysql/
│
├── app/
│   ├── Classes/                      # Core business logic
│   │   ├── Login.php                 # Login class - handles authentication
│   │   ├── Register.php              # Register class - user registration
│   │   ├── Schedule.php              # Schedule class - CRUD for schedules
│   │   ├── Note.php                  # Note class - CRUD for notes
│   │   └── Todolist.php              # Todolist class - CRUD for todos
│   │
│   └── Controllers/                  # Request handlers
│       ├── LoginController.php       # Handles login requests
│       ├── RegisterController.php    # Handles registration requests
│       ├── ScheduleController.php    # Handles schedule requests
│       ├── NoteController.php        # Handles note requests
│       └── TodolistController.php    # Handles todo requests
│
├── config/
│   ├── Database.php                  # Database connection class
│   └── config.php                    # Application configuration
│
├── public/
│   └── index.php                     # Entry point (redirects to login/home)
│
├── views/                            # HTML view templates
│   ├── login.php                     # Login page
│   ├── register.php                  # Registration page
│   ├── home.php                      # Dashboard/Home page (after login)
│   ├── schedule.php                  # Schedule management page
│   ├── note.php                      # Notes management page
│   ├── todolist.php                  # Todo list management page
│   ├── profile.php                   # User profile page
│   └── logout.php                    # Logout handler
│
├── assets/
│   ├── css/
│   │   └── style.css                 # Complete styling (responsive)
│   │
│   └── js/
│       ├── schedule.js               # Schedule page interactions
│       ├── note.js                   # Notes page interactions
│       └── todolist.js               # Todo list interactions
│
├── database.sql                      # Database schema (all tables)
├── index.php                         # Main entry point
├── README.md                         # This documentation
└── SETUP.md                          # Setup guide
```

---

## 🚀 Installation & Setup

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or use PHP's built-in server

### Step 1: Create the Database

```bash
# Create database
mysql -u root -p -e "CREATE DATABASE student_management;"

# Import schema
mysql -u root -p student_management < database.sql
```

Or manually execute `database.sql` content in phpMyAdmin.

### Step 2: Configure Database Connection

Edit `config/Database.php` and update these values:

```php
private $host = 'localhost';      // Your MySQL host
private $db_name = 'student_management';  // Database name
private $user = 'root';            // MySQL username
private $password = '';            // MySQL password (empty for default)
```

### Step 3: Start Web Server

**Option A: Using PHP Built-in Server** (Recommended for development)
```bash
cd /Users/trung/StudentMangermentPHP-Mysql
php -S localhost:8000 -t public/
```

**Option B: Using Apache**
- Place the project in your Apache `htdocs` folder
- Configure virtual host (optional)
- Access via `http://localhost/StudentMangermentPHP-Mysql/public/`

### Step 4: Access the Application

Open your browser and navigate to:
```
http://localhost:8000
```

You'll be redirected to login page if not logged in.

---

## 📱 Application Flow

### 1️⃣ Authentication Flow
```
Start Application
    ↓
[Check if logged in?]
    ├─ YES → Redirect to Home Page
    └─ NO → Redirect to Login Page
         ↓
    [Login Page]
    ├─ Existing User → Enter email & password
    │                    ↓
    │              Verify credentials
    │                    ↓
    │              Create session
    │                    ↓
    │              Redirect to Home
    │
    └─ New User? → Go to Register Page
                       ↓
                   [Register Page]
                   Enter name, email, password
                       ↓
                   Validate input
                       ↓
                   Hash password
                       ↓
                   Save to database
                       ↓
                   Redirect to Login
```

### 2️⃣ Home Page (Dashboard) - After Login
```
┌─────────────────────────────────────────────┐
│  Navbar (Top)                              │
│  ├─ Logo: Student Management               │
│  ├─ Menu:                                  │
│  │  ├─ Dashboard (Home)                    │
│  │  ├─ Schedule                            │
│  │  ├─ Notes                               │
│  │  ├─ Todo List                           │
│  │  └─ Profile                             │
│  └─ Logout Button                          │
├─────────────────────────────────────────────┤
│ Welcome Message                             │
│ "Welcome, [Student Name]!"                  │
├─────────────────────────────────────────────┤
│ Dashboard Cards (3 columns - Responsive)   │
│ ┌──────────────┐ ┌──────────────┐          │
│ │ Schedule     │ │ Notes        │          │
│ │ [Icon: 📅]   │ │ [Icon: 📝]   │          │
│ │ Manage...    │ │ Take & org...│          │
│ │ [View →]     │ │ [View →]     │          │
│ └──────────────┘ └──────────────┘          │
│                                             │
│ ┌──────────────┐                           │
│ │ Todo List    │                           │
│ │ [Icon: ✓]    │                           │
│ │ Manage...    │                           │
│ │ [View →]     │                           │
│ └──────────────┘                           │
├─────────────────────────────────────────────┤
│ University Information Footer (Bottom)      │
│ ├─ University Name & Location              │
│ ├─ Contact Information                     │
│ └─ Address                                 │
└─────────────────────────────────────────────┘
```

### 3️⃣ Schedule Page
```
┌─────────────────────────────────────────────┐
│ [Navigation Menu - Same as Home]           │
├─────────────────────────────────────────────┤
│ Schedule Management                         │
│ [Add New Schedule Button]                   │
├─────────────────────────────────────────────┤
│ Schedule Cards (Grid View)                  │
│ ┌──────────────┐ ┌──────────────┐          │
│ │ Math 101     │ │ Physics 101  │          │
│ │ Day: Monday  │ │ Day: Tuesday │          │
│ │ Time: 10:00  │ │ Time: 2:00 PM│          │
│ │ Room: 101    │ │ Room: 205    │          │
│ │ [Edit] [Del] │ │ [Edit] [Del] │          │
│ └──────────────┘ └──────────────┘          │
├─────────────────────────────────────────────┤
│ Modal: Add/Edit Schedule (When button clicked)
│ ┌─────────────────────────────┐            │
│ │ Add New Schedule            │            │
│ │ Course Name: [________]     │            │
│ │ Day: [Select Day]           │            │
│ │ Time: [HH:MM]               │            │
│ │ Location: [________]        │            │
│ │ [Save] [Cancel]             │            │
│ └─────────────────────────────┘            │
└─────────────────────────────────────────────┘
```

### 4️⃣ Notes Page
```
┌─────────────────────────────────────────────┐
│ [Navigation Menu]                           │
├─────────────────────────────────────────────┤
│ My Notes                                    │
│ [Create New Note Button]                    │
├─────────────────────────────────────────────┤
│ Notes Grid (Cards)                          │
│ ┌──────────────┐ ┌──────────────┐          │
│ │ Title 1      │ │ Title 2      │          │
│ │ [Lecture]    │ │ [Study]      │          │
│ │              │ │              │          │
│ │ Preview...   │ │ Preview...   │          │
│ │              │ │              │          │
│ │ Jan 20, 2025 │ │ Jan 19, 2025 │          │
│ │ [Edit][View] │ │ [Edit][View] │          │
│ │ [Delete]     │ │ [Delete]     │          │
│ └──────────────┘ └──────────────┘          │
├─────────────────────────────────────────────┤
│ Modal: Add/Edit Note (When button clicked)  │
│ ┌─────────────────────────────┐            │
│ │ Create New Note             │            │
│ │ Title: [________]           │            │
│ │ Category: [Select]          │            │
│ │ Content: [________]         │            │
│ │          [________]         │            │
│ │ [Save Note] [Cancel]        │            │
│ └─────────────────────────────┘            │
└─────────────────────────────────────────────┘
```

### 5️⃣ Todo List Page
```
┌─────────────────────────────────────────────┐
│ [Navigation Menu]                           │
├─────────────────────────────────────────────┤
│ My Todo List                                │
│ [Add New Todo Button]                       │
├─────────────────────────────────────────────┤
│ Statistics Row                              │
│ ┌────────┐ ┌────────┐ ┌────────┐          │
│ │ Total  │ │Pending │ │Completed          │
│ │   5    │ │   3    │ │    2    │          │
│ └────────┘ └────────┘ └────────┘          │
├─────────────────────────────────────────────┤
│ Todo List Items                             │
│ ☐ Assignment 1              [✎][✕]         │
│   Description here...                       │
│   🔴 High Priority Due: Jan 25, 2025       │
│                                             │
│ ☑ Read Chapter 5             [✎][✕]       │
│   Study Material...                         │
│   🟡 Medium Priority Due: Jan 23, 2025    │
│                                             │
│ ☐ Project Work               [✎][✕]       │
│   Final Project...                          │
│   🟢 Low Priority Due: Feb 1, 2025        │
├─────────────────────────────────────────────┤
│ Modal: Add/Edit Todo (When button clicked)  │
│ ┌─────────────────────────────┐            │
│ │ Add New Todo                │            │
│ │ Task Title: [________]      │            │
│ │ Description: [____]         │            │
│ │ Priority: [Select]          │            │
│ │ Due Date: [Date Picker]     │            │
│ │ [Save Todo] [Cancel]        │            │
│ └─────────────────────────────┘            │
└─────────────────────────────────────────────┘
```

---

## 🗄️ Database Schema

### Users Table
```sql
id              INT (Primary Key, Auto Increment)
name            VARCHAR(100) - Student name
email           VARCHAR(100) - Unique email
password        VARCHAR(255) - Hashed password
created_at      TIMESTAMP - Account creation date
updated_at      TIMESTAMP - Last update date
```

### Schedules Table
```sql
id              INT (Primary Key, Auto Increment)
user_id         INT (Foreign Key → users.id)
course_name     VARCHAR(100) - Course name
day             VARCHAR(20) - Day of week (Monday-Sunday)
time            VARCHAR(10) - Time (HH:MM)
location        VARCHAR(100) - Room/Building
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

### Notes Table
```sql
id              INT (Primary Key, Auto Increment)
user_id         INT (Foreign Key → users.id)
title           VARCHAR(200) - Note title
content         LONGTEXT - Full note content
category        VARCHAR(50) - Category (general, lecture, assignment, etc)
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

### Todos Table
```sql
id              INT (Primary Key, Auto Increment)
user_id         INT (Foreign Key → users.id)
title           VARCHAR(200) - Task title
description     LONGTEXT - Task description
priority        ENUM(low, medium, high) - Priority level
status          ENUM(pending, completed) - Task status
due_date        DATE - Due date
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

---

## 🔐 Security Features

✅ **Password Security**
- Uses PHP's `password_hash()` (bcrypt algorithm)
- Passwords verified with `password_verify()`
- Minimum 6 characters required
- Can't be empty

✅ **SQL Injection Prevention**
- All queries use prepared statements
- Parameters bound using parameterized queries
- Never concatenates user input into SQL

✅ **Input Validation**
- Email format validation
- Password strength requirements
- Form field validation
- XSS prevention with `htmlspecialchars()`

✅ **Session Management**
- Secure session handling
- Session timeout configuration
- Logout clears session

✅ **Data Protection**
- Foreign keys for referential integrity
- Cascading deletes (user data deleted when user removed)
- Timestamps for audit trail

---

## 🎨 UI/UX Features

### Colors & Design
- **Primary Color**: #3498db (Blue)
- **Secondary Color**: #2ecc71 (Green)
- **Danger Color**: #e74c3c (Red)
- **Warning Color**: #f39c12 (Orange)

### Responsive Breakpoints
- **Desktop**: 1200px and above
- **Tablet**: 768px - 1199px
- **Mobile**: 480px - 767px
- **Small Mobile**: Below 480px

### Components
- Modal dialogs for forms
- Card layouts for content
- Grid layouts for listings
- Color-coded priority levels
- Smooth animations and transitions
- Hover effects on interactive elements

---

## 📝 Usage Examples

### Login
```
Navigate to: http://localhost:8000
1. Click Login
2. Enter registered email and password
3. Click Login button
4. Redirected to Home page
```

### Register New Account
```
Navigate to: http://localhost:8000
1. Click "Register here" link
2. Enter Full Name, Email, Password
3. Confirm Password
4. Click Register button
5. Success message and redirect to login
```

### Create a Schedule
```
On Schedule Page:
1. Click "Add New Schedule" button
2. Enter Course Name (e.g., "Math 101")
3. Select Day (Monday-Sunday)
4. Enter Time (e.g., "10:00")
5. Enter Location/Room
6. Click "Save Schedule"
```

### Create a Note
```
On Notes Page:
1. Click "Create New Note" button
2. Enter Note Title
3. Select Category (Lecture, Assignment, Study, etc)
4. Write content in textarea
5. Click "Save Note"
```

### Create a Todo
```
On Todo List Page:
1. Click "Add New Todo" button
2. Enter Task Title
3. Optional: Add description
4. Select Priority (Low, Medium, High)
5. Optional: Set Due Date
6. Click "Save Todo"
7. Check checkbox to mark as complete
```

---

## 🧪 Testing the System

### Test Account
You can create a test account:
```
Name: John Doe
Email: john@example.com
Password: password123
```

### Test Workflow
1. Register account
2. Login with credentials
3. Create 2-3 schedules
4. Create 2-3 notes in different categories
5. Create 3-5 todos with different priorities
6. Test edit and delete functions
7. Check profile page
8. Logout and re-login

---

## 🔧 Troubleshooting

### Database Connection Error
- Check MySQL is running
- Verify credentials in `config/Database.php`
- Ensure `student_management` database exists
- Check `database.sql` was imported

### Session Issues
- Clear browser cookies
- Check PHP session configuration
- Ensure `tmp` folder has write permissions

### Page Not Loading
- Check web server is running
- Verify correct port (default 8000)
- Check file paths are correct
- Look for PHP errors in server output

### CSS/JS Not Loading
- Ensure relative paths are correct
- Check file permissions
- Verify assets folder structure
- Clear browser cache

---

## 📚 Class Methods Reference

### Login Class
```php
login($email, $password)           // Authenticate user
logout()                           // End session
isLoggedIn()                       // Check if logged in
getCurrentUser()                   // Get current user data
```

### Register Class
```php
register($name, $email, $password, $confirm_password)  // Register new user
```

### Schedule Class
```php
createSchedule($user_id, $course_name, $day, $time, $location)
getSchedulesByUser($user_id)
getScheduleById($schedule_id)
updateSchedule($schedule_id, $course_name, $day, $time, $location)
deleteSchedule($schedule_id)
```

### Note Class
```php
createNote($user_id, $title, $content, $category)
getNotesByUser($user_id)
getNoteById($note_id)
updateNote($note_id, $title, $content, $category)
deleteNote($note_id)
searchNotes($user_id, $keyword)
```

### Todolist Class
```php
createTodo($user_id, $title, $description, $priority, $due_date)
getTodosByUser($user_id, $status)
getTodoById($todo_id)
updateTodo($todo_id, $title, $description, $priority, $due_date)
updateTodoStatus($todo_id, $status)
deleteTodo($todo_id)
getTodoStats($user_id)
```

---

## 🚀 Future Enhancements

- [ ] Email verification for registration
- [ ] Password reset via email
- [ ] Advanced search and filters
- [ ] Note sharing between students
- [ ] Todo recurring tasks
- [ ] File attachments for notes
- [ ] Calendar view for schedules
- [ ] Grade/GPA management
- [ ] Attendance tracking
- [ ] Dashboard analytics and charts
- [ ] Dark mode theme
- [ ] Mobile app (React Native)
- [ ] Real-time notifications
- [ ] Two-factor authentication

---

## 📄 License

This project is open source and available for educational purposes.

---

## ✨ Summary

You now have a fully functional Student Management System with:
- ✅ Complete authentication system
- ✅ Dashboard with quick access
- ✅ Schedule management
- ✅ Notes management
- ✅ Todo list management
- ✅ Responsive design
- ✅ Modern UI/UX
- ✅ Security best practices
- ✅ Complete documentation

**Ready to use! Happy managing! 🎓**
