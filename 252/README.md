# CSE 4165 / CSE 465 Web Programming - Final 252 (Summer 2025)

This folder contains complete and tested solutions for all questions from **Final Exam 252**.

---

## Question 1: JavaScript Daily Calorie Tracker [10 Marks]
- **Folder:** [`q1/`](./q1/)
- **Files:** [`index.html`](./q1/index.html), [`script.js`](./q1/script.js)

### Rules & Logic:
- Daily calorie goal: **2000 calories**.
- Adds entered meal calories to running total.
- Displays total calories consumed so far.
- Real-time feedback messages based on progress:
  - `0 – 800`: **"You’re off to a healthy start!"**
  - `801 – 1600`: **"Good progress, keep it balanced!"**
  - `1601 – 1999`: **"Almost at your limit!"**
  - `2000+`: **"Goal reached! Stay mindful!"**
- Counts number of entries made.
- If user logs calories **more than 10 times** without reaching the goal (< 2000), displays:
  **"Be cautious of frequent snacking!"**

### Exam Sample Verification:
| Calorie Inputs | Total Calories | Feedback Message |
| :--- | :--- | :--- |
| `300, 500, 700` | 1500 kcal | **Good progress, keep it balanced!** |
| `1000, 800, 300` | 2100 kcal | **Goal reached! Stay mindful!** |
| `12 entries, total 1500` | 1500 kcal | **Be cautious of frequent snacking!** |

---

## Question 2: PHP Movie Night Screen Calculator [10 Marks]
- **Folder:** [`q2/`](./q2/)
- **Files:** [`index.html`](./q2/index.html), [`calculate.php`](./q2/calculate.php)

### Logic & Formulas:
1. **Total Screens:** `ceil($attendees / $seatCapacity)` (complete screens only).
2. **Empty Seats:** `($totalScreens * $seatCapacity) - $attendees`.
3. **Wasted Money (BDT):** `$emptySeats * $ticketPrice`.

### Exam Sample Verification:
| Attendees | Seat Capacity | Ticket Price | Total Screens | Empty Seats | Wasted Money (BDT) |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 150 | 60 | 500 | **3** | **30** | **15,000** |
| 280 | 100 | 400 | **3** | **20** | **8,000** |
| 320 | 120 | 350 | **3** | **40** | **14,000** |

Run in CLI:
```bash
php calculate.php
```

---

## Question 3: PHP & MySQL Sales Data Analysis [10 Marks]
- **Folder:** [`q3/`](./q3/)
- **Files:** [`schema.sql`](./q3/schema.sql), [`index.php`](./q3/index.php)
- **Database:** `sundarban` | **Table:** `sales_data`

### SQL Tasks:
1. **Total revenue per category:**
   ```sql
   SELECT CategoryName, SUM(Revenue) AS TotalRevenue
   FROM sales_data
   GROUP BY CategoryName;
   ```
2. **Update category to 'Low Performing' if revenue < 40,000 BDT:**
   ```sql
   UPDATE sales_data
   SET CategoryName = 'Low Performing'
   WHERE Revenue < 40000;
   ```
3. **Add 10% bonus revenue if revenue > 70,000 BDT:**
   ```sql
   UPDATE sales_data
   SET Revenue = Revenue * 1.10
   WHERE Revenue > 70000;
   ```
4. **Display product name, category, and label 'Top Seller' if above category average revenue, else 'Regular Seller':**
   ```sql
   SELECT s1.ProductName, s1.CategoryName, s1.Revenue,
          CASE 
              WHEN s1.Revenue > (
                  SELECT AVG(s2.Revenue) 
                  FROM sales_data s2 
                  WHERE s2.CategoryName = s1.CategoryName
              ) THEN 'Top Seller'
              ELSE 'Regular Seller'
          END AS SellerLabel
   FROM sales_data s1;
   ```
