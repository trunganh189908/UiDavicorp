# Student Management System - Application Flow Diagram

## 1. Authentication Flow

```
┌──────────────────────────────────────────────────────────────┐
│                    APPLICATION START                         │
└──────────────────────────────────────────────────────────────┘
                            ↓
                   ┌─────────────────┐
                   │  Check Session  │
                   └─────────────────┘
                      ↙           ↘
            YES (Logged in)    NO (Not logged in)
              ↓                    ↓
        ┌──────────────┐    ┌─────────────────────┐
        │  Go to Home  │    │  Show Login Page    │
        └──────────────┘    └─────────────────────┘
                                 ↓
                        ┌─────────────────────┐
                        │  Login or Register? │
                        └─────────────────────┘
                         ↙                  ↘
                    LOGIN               REGISTER
                     ↓                     ↓
            ┌─────────────────┐  ┌──────────────────┐
            │  Enter Email    │  │  Enter Name      │
            │  Enter Password │  │  Enter Email     │
            └─────────────────┘  │  Enter Password  │
                   ↓              │  Confirm Pass    │
            ┌─────────────────┐  └──────────────────┘
            │ Verify Creds    │           ↓
            │ Hash Password   │  ┌──────────────────┐
            │ Create Session  │  │  Validate Input  │
            └─────────────────┘  │  Check if exists │
                   ↓              │  Hash password   │
            ┌─────────────────┐  │  Save to DB      │
            │  Go to Home     │  └──────────────────┘
            └─────────────────┘           ↓
                                  ┌──────────────────┐
                                  │ Success Message  │
                                  │ Go to Login      │
                                  └──────────────────┘
```

---

## 2. Main Dashboard Navigation

```
                    ┌─────────────────────┐
                    │   HOME PAGE         │
                    │   (Dashboard)       │
                    └─────────────────────┘
                            ↓
        ┌───────────────────────────────────────────┐
        │         NAVIGATION MENU (TOP)             │
        └───────────────────────────────────────────┘
             ↓          ↓          ↓          ↓
        ┌────────┐  ┌────────┐  ┌────────┐  ┌─────────┐
        │Schedule│  │ Notes  │  │  Todos │  │ Profile │
        └────────┘  └────────┘  └────────┘  └─────────┘
             ↓          ↓          ↓          ↓
        [Schedule   [Notes     [Todos     [Profile
         Page]      Page]      Page]      Page]
             ↓          ↓          ↓          ↓
        [Manage   [Write &   [Track    [View &
         Classes] Organize]  Tasks]    Edit Info]
             
        ────────────────────────────────────────────────
        
                    ┌──────────┐
                    │  LOGOUT  │ (Top Right)
                    └──────────┘
```

---

## 3. Schedule Page Flow

```
┌─────────────────────────────────────┐
│      SCHEDULE MANAGEMENT PAGE       │
└─────────────────────────────────────┘
           ↓
    ┌────────────────────┐
    │ Display All User's │
    │    Schedules       │
    └────────────────────┘
           ↓
    ┌─────────────────────────────┐
    │  [Add New Schedule Button]  │
    └─────────────────────────────┘
        ↓                    ↓
    CLICK              EDIT/DELETE
        ↓                    ↓
┌──────────────┐      ┌──────────────────┐
│ Modal Opens: │      │ Hover on card:   │
│ Add Schedule │      │ Edit button  ✎   │
│              │      │ Delete btn   ✕   │
│ Course Name  │      └──────────────────┘
│ Day (Dropdown)
│ Time (Input)  │
│ Location      │
│              │
│ [Save]       │
└──────────────┘
     ↓
┌──────────────────┐
│ Save to Database │
│ Refresh page     │
│ Show success msg │
└──────────────────┘
```

---

## 4. Notes Page Flow

```
┌──────────────────────────────┐
│     NOTES MANAGEMENT PAGE    │
└──────────────────────────────┘
           ↓
    ┌───────────────────┐
    │ Display All Notes │
    │ in Card Layout    │
    └───────────────────┘
           ↓
    ┌──────────────────────┐
    │ [Create New Note]    │
    └──────────────────────┘
        ↓                ↓
    CREATE           VIEW/EDIT/DELETE
        ↓                ↓
┌──────────────┐    ┌────────────────┐
│ Modal Opens: │    │ Cards show:    │
│ Add Note     │    │ • Title        │
│              │    │ • Category     │
│ Title        │    │ • Preview      │
│ Category     │    │ • Date         │
│ Content      │    │ • Actions      │
│              │    └────────────────┘
│ [Save Note]  │    
└──────────────┘
     ↓
┌──────────────────────┐
│ Save to Database     │
│ Refresh & show note  │
│ Success notification │
└──────────────────────┘
```

---

## 5. Todo List Page Flow

```
┌──────────────────────────────┐
│    TODO LIST MANAGEMENT      │
└──────────────────────────────┘
           ↓
┌──────────────────────────────┐
│      STATISTICS ROW          │
│ ┌────────────────────────┐   │
│ │ Total │ Pending │ Done │   │
│ │   5   │   3     │  2   │   │
│ └────────────────────────┘   │
└──────────────────────────────┘
           ↓
    ┌──────────────────────┐
    │ [Add New Todo]       │
    └──────────────────────┘
        ↓                ↓
    CREATE           COMPLETE/EDIT/DELETE
        ↓                ↓
┌──────────────┐    ┌──────────────────┐
│ Modal Opens: │    │ List shows:      │
│ Add Todo     │    │ ☐/☑ Title       │
│              │    │    Description   │
│ Task Title   │    │    Priority      │
│ Description  │    │    Due Date      │
│ Priority     │    │    [✎] [✕]      │
│ Due Date     │    └──────────────────┘
│              │    
│ [Save Todo]  │    
└──────────────┘         ↓
     ↓            ┌──────────────────┐
     ↓            │ Click checkbox:  │
     ↓            │ Toggle complete  │
     ↓            │ Update status    │
┌──────────────────────┐ │ Refresh list │
│ Save to Database     │ └──────────────┘
│ Refresh & show todo  │
│ Update statistics    │
│ Success notification │
└──────────────────────┘
```

---

## 6. Complete User Journey

```
START
  ↓
[Not Registered]
  ↓
┌─────────────────┐
│ Register Page   │ ← Fill: Name, Email, Password
│ [Register]      │
└─────────────────┘
  ↓
┌─────────────────┐
│ Login Page      │ ← Fill: Email, Password
│ [Login]         │
└─────────────────┘
  ↓
┌──────────────────┐
│ HOME DASHBOARD   │ ← See welcome, choose action
└──────────────────┘
  ↓
  ├─→ SCHEDULE PAGE ────→ [View] → [Add] → [Edit] → [Delete]
  │
  ├─→ NOTES PAGE ───────→ [View] → [Add] → [Edit] → [Delete]
  │
  ├─→ TODO LIST PAGE ───→ [View] → [Add] → [Edit] → [Delete] → [Toggle]
  │
  ├─→ PROFILE PAGE ─────→ [View Info]
  │
  └─→ LOGOUT ──────────→ [End Session] → [Login Page]
```

---

## 7. Database Operations (CRUD)

```
┌─────────────────────────────────────────────────┐
│              CRUD OPERATIONS                    │
└─────────────────────────────────────────────────┘

┌──────────┐
│  CREATE  │ → User submits form with data
│  (POST)  │ → Validate input
└──────────┘ → Hash sensitive data
    ↓        → INSERT into database
    ↓        → Return success/error
    ↓

┌────────┐
│  READ  │ → Query database (SELECT)
│ (GET)  │ → Fetch user's records
└────────┘ → Display in page
    ↓        → Return data

┌────────┐
│UPDATE  │ → User submits edited form
│(POST)  │ → Validate input
└────────┘ → UPDATE record in database
    ↓      → Return success/error
    ↓

┌────────┐
│DELETE  │ → User clicks delete
│(GET)  │ → Confirm action
└────────┘ → DELETE from database
    ↓      → Return success/error
    ↓
```

---

## 8. Session & Authentication Flow

```
┌──────────────────────────────────────┐
│    SESSION & AUTHENTICATION FLOW     │
└──────────────────────────────────────┘

USER REGISTERS:
  Input: Name, Email, Password
    ↓
  Validate: Email format, Password strength
    ↓
  Check: Email not already used
    ↓
  Hash: password_hash($password)
    ↓
  Store: Insert into users table
    ↓
  Result: Success → Redirect to Login

USER LOGS IN:
  Input: Email, Password
    ↓
  Query: SELECT from users WHERE email = ?
    ↓
  Verify: password_verify($input, $stored)
    ↓
  Success: Create SESSION variables
           $_SESSION['user_id'] = $id
           $_SESSION['email'] = $email
           $_SESSION['name'] = $name
    ↓
  Redirect: → Home Page

PROTECTED PAGES:
  On Load: Check if $_SESSION['user_id'] exists
    ├─ YES → Show page
    └─ NO → Redirect to Login

USER LOGS OUT:
  Action: Click Logout button
    ↓
  Destroy: session_destroy()
    ↓
  Clear: All SESSION variables
    ↓
  Redirect: → Login Page
```

---

## 9. File Request Flow

```
USER REQUEST
    ↓
┌──────────────────────────┐
│ HTTP Request to Server   │
│ GET/POST to .php file    │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Check Session/Auth       │
│ If not logged in:        │
│ → Redirect to login      │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Load Controller          │
│ Handle form submission   │
│ if POST request          │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Instantiate Class        │
│ Perform business logic   │
│ (CRUD operations)        │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Query Database           │
│ Get/Process data         │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Return result to View    │
│ (success/error)          │
└──────────────────────────┘
    ↓
┌──────────────────────────┐
│ Render HTML              │
│ Display result to user   │
│ Include CSS/JS           │
└──────────────────────────┘
    ↓
USER SEES RESULT
```

---

## 10. Mobile Responsive Design Flow

```
┌──────────────────────────────────────────┐
│     RESPONSIVE DESIGN BREAKPOINTS        │
└──────────────────────────────────────────┘

SCREEN SIZE
    ↓
┌─────────────────────────────────────┐
│ ≥ 1200px (Desktop)                  │
│ ├─ Full navigation menu              │
│ ├─ Multi-column grid layouts         │
│ ├─ Full sidebar (if exists)          │
│ └─ All features visible              │
└─────────────────────────────────────┘
    ↓
┌─────────────────────────────────────┐
│ 768px - 1199px (Tablet)             │
│ ├─ Hamburger menu (collapsible)     │
│ ├─ 2-column grid layouts            │
│ ├─ Adjusted padding/margins         │
│ └─ Touch-friendly buttons           │
└─────────────────────────────────────┘
    ↓
┌─────────────────────────────────────┐
│ 480px - 767px (Mobile)              │
│ ├─ Full screen mobile menu          │
│ ├─ 1-column grid layouts            │
│ ├─ Stacked forms                    │
│ └─ Larger touch targets             │
└─────────────────────────────────────┘
    ↓
┌─────────────────────────────────────┐
│ < 480px (Small Mobile)              │
│ ├─ Minimal navigation               │
│ ├─ Simplified layouts               │
│ ├─ Vertical stacking                │
│ └─ Maximum usability                │
└─────────────────────────────────────┘
```

---

## 11. Error Handling Flow

```
USER ACTION
    ↓
TRY TO PROCESS
    ↓
┌─────────────────────────────┐
│ VALIDATION ERROR?           │
└─────────────────────────────┘
    ├─ YES → Show error message
    │        → Highlight field
    │        → Stay on page
    │        → Return to form
    │
    └─ NO → Continue

┌─────────────────────────────┐
│ DATABASE ERROR?             │
└─────────────────────────────┘
    ├─ YES → Show error alert
    │        → Log error
    │        → Suggest action
    │        → Stay on page
    │
    └─ NO → SUCCESS!

┌─────────────────────────────┐
│ DISPLAY RESULT              │
│ ├─ Success: ✓ Green alert  │
│ └─ Error: ✗ Red alert      │
└─────────────────────────────┘
    ↓
REDIRECT or REFRESH
    ↓
PAGE UPDATED WITH RESULT
```

---

## 12. Summary Flow Overview

```
                    ┌──────────────┐
                    │ START        │
                    └──────────────┘
                          ↓
        ┌─────────────────────────────────┐
        │ AUTHENTICATION LAYER            │
        │ Register → Login → Session      │
        └─────────────────────────────────┘
                    ↓
        ┌─────────────────────────────────┐
        │ HOME PAGE / DASHBOARD           │
        │ Welcome + Quick Access          │
        └─────────────────────────────────┘
                    ↓
    ┌──────────────────────────────────────┐
    │ FEATURE PAGES (Choose one)           │
    ├──────────────────────────────────────┤
    │ • Schedule Management (Add/Edit/Del) │
    │ • Notes Management (Add/Edit/Del)    │
    │ • Todos Management (Add/Edit/Del)    │
    │ • Profile (View Info)                │
    └──────────────────────────────────────┘
                    ↓
    ┌──────────────────────────────────────┐
    │ CRUD OPERATIONS                      │
    │ Read data → Add/Edit/Delete → Store  │
    └──────────────────────────────────────┘
                    ↓
        ┌─────────────────────────────────┐
        │ DATABASE                        │
        │ Persist user data               │
        └─────────────────────────────────┘
                    ↓
        ┌─────────────────────────────────┐
        │ LOGOUT                          │
        │ Destroy session → Login Page    │
        └─────────────────────────────────┘
                          ↓
                    ┌──────────────┐
                    │ END          │
                    └──────────────┘
```

---

This diagram provides a complete visual representation of how the Student Management System operates!
