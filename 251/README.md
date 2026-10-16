# CSE 4165 / CSE 465 Web Programming - Final 251 (Spring 2025)

This folder contains complete and tested solutions for all questions from **Final Exam 251**.

---

## Question 1: JavaScript Password Strength Checker [10 Marks]
- **Folder:** [`q1/`](./q1/)
- **Files:** [`index.html`](./q1/index.html), [`script.js`](./q1/script.js)

### Logic & Scoring Rules:
- **Length:** `+10 points` for every 2 characters beyond the minimum 6 characters threshold (`Math.floor((length - 6) / 2) * 10`).
- **Uppercase Letters:** `+15 points` if present (`[A-Z]`).
- **Lowercase Letters:** `+15 points` if present (`[a-z]`).
- **Numbers:** `+20 points` if present (`[0-9]`).
- **Special Characters:** `+25 points` if present (`[!@#$%^&*]`).

### Strength Levels:
- `0 - 30`: **Very Weak**
- `31 - 50`: **Weak**
- `51 - 70`: **Medium**
- `71 - 90`: **Strong**
- `91+`: **Very Strong**
- `100+`: Displays **"Perfect Password!"** with success message.
- Keeps track of total attempts made.
- If attempts > 8 without reaching "Strong" (score < 71), displays **"Need practice!"** and shows password tips.

### Exam Sample Verification:
| Input | Computed Score & Breakdown | Level / Output |
| :--- | :--- | :--- |
| `abc` | Length: 0, Lower: 15 &rarr; **15 pts** | **Very Weak** |
| `hello123` | Length: 10, Lower: 15, Num: 20 &rarr; **45 pts** | **Weak** |
| `Strong@Pass` | Length: 20, Upper: 15, Lower: 15, Special: 25 &rarr; **75 pts** | **Strong** |
| `Perfect@Pass123` | Length: 40, Upper: 15, Lower: 15, Num: 20, Special: 25 &rarr; **115 pts** | **Perfect Password!** |

---

## Question 2: PHP UIU Tech Fest Venue Budget Calculator [10 Marks]
- **Folder:** [`q2/`](./q2/)
- **Files:** [`index.html`](./q2/index.html), [`calculate.php`](./q2/calculate.php)

### Logic & Formulas:
1. **Total Venues:** `ceil($attendees / $venueCapacity)` (complete venues only).
2. **Empty Seats:** `($totalVenues * $venueCapacity) - $attendees`.
3. **Wasted Money (BDT):** `$emptySeats * $costPerPerson`.

### Exam Sample Verification:
| Attendees | Cost / Person | Venue Capacity | Total Venues | Empty Seats | Wasted Money (BDT) |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 250 | 120 | 80 | **4** | **70** | **8,400** |
| 180 | 150 | 100 | **2** | **20** | **3,000** |
| 300 | 100 | 75 | **4** | **0** | **0** |

Run in CLI:
```bash
php calculate.php
```

---

## Question 3: PHP & MySQL Employee Management [10 Marks]
- **Folder:** [`q3/`](./q3/)
- **Files:** [`schema.sql`](./q3/schema.sql), [`index.php`](./q3/index.php)
- **Database:** `uiutech_final` | **Table:** `employee_final`

### SQL Tasks:
1. **Total employees per performance rating:**
   ```sql
   SELECT PerformanceRating, COUNT(*) AS TotalEmployees
   FROM employee_final
   GROUP BY PerformanceRating;
   ```
2. **Update rating to 'C' for salary < 40,000 BDT (if not 'D'):**
   ```sql
   UPDATE employee_final
   SET PerformanceRating = 'C'
   WHERE Salary < 40000 AND PerformanceRating != 'D';
   ```
3. **Add 5,000 BDT bonus if salary > 50,000 BDT and new salary <= 60,000 BDT:**
   ```sql
   UPDATE employee_final
   SET Salary = Salary + 5000
   WHERE Salary > 50000 AND (Salary + 5000) <= 60000;
   ```
4. **Department names & employee counts sorted descending:**
   ```sql
   SELECT DepartmentName, COUNT(*) AS NumberOfEmployees
   FROM employee_final
   GROUP BY DepartmentName
   ORDER BY NumberOfEmployees DESC;
   ```
