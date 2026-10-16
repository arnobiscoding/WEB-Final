# UIU CSE 4165 / CSE 465 Web Programming — Final Exam Solutions

This repository contains clean, tested, and **barebones HTML, JavaScript, and PHP** solutions for all questions across 5 final exam semesters at United International University (UIU).

Designed specifically for exam revision — zero fluff, zero CSS clutter, straight-to-the-point logic that maximizes exam scores while remaining effortless to memorize.

---

## 📚 Essential Revision Guides
- 📑 **[Printable 2-Page Exam Cheatsheet](CHEATSHEET.md)** — Plug-and-play templates to solve Q1, Q2, and Q3 in under 15 minutes.
- 📊 **[Question Pattern Analysis & Master Guide](QUESTION_PATTERN_ANALYSIS.md)** — In-depth breakdown of question archetypes, scoring formulas, recurring exam traps, and time allocation.

---

## 📁 Directory Structure & Sitemap

```
d:\WEB Final\
│
├── 📂 251/                     (Spring 2025 Final)
│   ├── 📂 q1/                  JavaScript Password Strength Checker
│   ├── 📂 q2/                  PHP Venue Booking Budget Calculator
│   └── 📂 q3/                  PHP & MySQL Employee Management
│
├── 📂 252/                     (Summer 2025 Final)
│   ├── 📂 q1/                  JavaScript Daily Calorie Intake Tracker
│   ├── 📂 q2/                  PHP Movie Night Screen Calculator
│   └── 📂 q3/                  PHP & MySQL Sales Data Analysis
│
├── 📂 253/                     (Fall 2025 Final)
│   ├── 📂 q1/                  PHP Student CT & Exam Marks Processor (`rsort()`)
│   ├── 📂 q2/                  PHP Event-Planning Sales Tracker
│   └── 📂 q3/                  PHP & MySQL Campus Library Management
│
├── 📂 261A/                    (Spring 2026 SET - A)
│   ├── 📂 q1/                  JavaScript Weekly Study Hours Tracker
│   ├── 📂 q2/                  PHP Student Academic Tracking System
│   └── 📂 q3/                  PHP & MySQL Tourism Spot Management
│
└── 📂 261B/                    (Spring 2026 SET - B)
    ├── 📂 q1/                  JavaScript Patient Vitals Live Health Report
    ├── 📂 q2/                  PHP Mars Rover Battery Modules Calculator
    └── 📂 q3/                  PHP & MySQL UIU Bookshop Management
```

---

## 🚀 How to Run & Test

### 1. JavaScript Applications (Q1)
Open any `index.html` file directly in your web browser:
- `251/q1/index.html`
- `252/q1/index.html`
- `261A/q1/index.html`
- `261B/q1/index.html`

Enter test numbers and click the button to see real-time updates and threshold alerts.

---

### 2. PHP Applications (Q2 and 253 Q1)
Run using PHP's built-in development server from the project root:
```bash
php -S localhost:8000
```
Then navigate to:
- `http://localhost:8000/251/q2/index.php`
- `http://localhost:8000/252/q2/index.php`
- `http://localhost:8000/253/q1/index.php`
- `http://localhost:8000/253/q2/index.php`
- `http://localhost:8000/261A/q2/index.php`
- `http://localhost:8000/261B/q2/index.php`

Or run directly via XAMPP Apache by placing the folder in `C:\xampp\htdocs\WEB Final\`.

---

### 3. PHP & MySQL Applications (Q3)
1. **Set up the Database:**
   Import the corresponding `schema.sql` file in **phpMyAdmin** or your MySQL client:
   - `251/q3/schema.sql` &rarr; `uiutech_final`
   - `252/q3/schema.sql` &rarr; `sundarban`
   - `253/q3/schema.sql` &rarr; `campus_library`
   - `261A/q3/schema.sql` &rarr; `tourism`
   - `261B/q3/schema.sql` &rarr; `uiu_bookshop`

2. **Run `index.php`:**
   Navigate in your browser via XAMPP:
   `http://localhost/WEB%20Final/261A/q3/index.php`

> **Note on MySQL Port:**
> All Q3 scripts connect to MySQL using:
> ```php
> $conn = @new mysqli('127.0.0.1', 'root', '', 'database_name', 3307);
> if ($conn->connect_error) {
>     $conn = new mysqli('localhost', 'root', '', 'database_name');
> }
> ```
> This guarantees automatic compatibility both on systems where XAMPP uses **Port 3307** and in lab exam computers using standard **Port 3306**.
