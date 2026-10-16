# CSE 4165 / CSE 465 Web Programming - Final 253 (Fall 2025)

This folder contains complete and tested solutions for all questions from **Final Exam 253**.

---

## Question 1: PHP Student CT and Exam Marks Processor [10 Marks]
- **Folder:** [`q1/`](./q1/)
- **File:** [`index.php`](./q1/index.php)

### Logic & Rules:
1. Takes 3 Class Test (CT) marks, 1 Midterm mark, and 1 Final Exam mark.
2. Selects the **best two CT marks** using sorting (`rsort()`).
3. Computes:
   - Best two CTs total: `CT_best1 + CT_best2`
   - CT average: `(CT_best1 + CT_best2) / 2`
   - Total Marks: computed as matching the exam demo output (`Best two CT's total + Midterm + Final`). Also displays average for comprehensive accuracy.
4. Status: **"Passed"** if `Total Marks > 54`, otherwise **"Failed"**.

### Exam Sample Verification:
- **Inputs:** CT1: `12`, CT2: `15`, CT3: `14`, Midterm: `22`, Final: `32`
- **Best two CTs:** `15` and `14` &rarr; Total: `29` (Average: `14.5`)
- **Total Marks:** `29 + 22 + 32 = 83`
- **Status:** **Passed** (83 > 54)

---

## Question 2: PHP Event Planning Sales Tracker [10 Marks]
- **Folder:** [`q2/`](./q2/)
- **Files:** [`index.html`](./q2/index.html), [`calculate.php`](./q2/calculate.php)

### Logic & Classification:
- **Total Items Sold:** `Items Sold per Day * Number of Days`
- **Performance Rating:**
  - `400+` (or 500+ in text): **Excellent**
  - `300 - 499`: **Good**
  - `150 - 299`: **Average**
  - `< 150`: **Poor**
- **Target Comparison:**
  - `Above target by X items`
  - `Below target by X items`
  - `Target met exactly (0 difference)`

### Exam Sample Verification:
| Items Sold / Day | Days | Target | Total Items | Performance | Result |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 25 | 12 | 300 | **300** | **Good** | **Target met exactly (0 difference)** |
| 40 | 10 | 350 | **400** | **Excellent** | **Above target by 50 items** |
| 15 | 10 | 200 | **150** | **Average** | **Below target by 50 items** |
| 8 | 10 | 120 | **80** | **Poor** | **Below target by 40 items** |

Run in CLI:
```bash
php calculate.php
```

---

## Question 3: PHP & MySQL Campus Library Management [10 Marks]
- **Folder:** [`q3/`](./q3/)
- **Files:** [`schema.sql`](./q3/schema.sql), [`index.php`](./q3/index.php)
- **Database:** `campus_library` | **Table:** `book_loans`

### SQL Tasks:
1. **Show total books for statuses with > 1 entry:**
   ```sql
   SELECT Status, COUNT(*) AS TotalBooks
   FROM book_loans
   GROUP BY Status
   HAVING COUNT(*) > 1;
   ```
2. **Grant Grace Period to overdue loans under 7 days:**
   ```sql
   UPDATE book_loans
   SET Status = 'Grace Period', PenaltyFee = 0.00
   WHERE Status = 'Overdue' AND DaysOverdue < 7;
   ```
3. **Add 10% processing charge for fees > 20.00 (max 50.00):**
   ```sql
   UPDATE book_loans
   SET PenaltyFee = PenaltyFee * 1.10
   WHERE PenaltyFee > 20.00 AND (PenaltyFee * 1.10) <= 50.00;
   ```
4. **Total penalty fee per book sorted descending:**
   ```sql
   SELECT BookTitle, SUM(PenaltyFee) AS TotalPenaltyFee
   FROM book_loans
   GROUP BY BookTitle
   ORDER BY TotalPenaltyFee DESC;
   ```
