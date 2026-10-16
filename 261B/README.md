# CSE 4165 / CSE 465 Web Programming - Final 261 SET - B (Spring 2026)

This folder contains complete and tested solutions for all questions from **Final Exam 261 SET - B**.

---

## Question 1: JavaScript Patient Vitals Live Health Report [10 Marks]
- **Folder:** [`q1/`](./q1/)
- **Files:** [`index.html`](./q1/index.html), [`script.js`](./q1/script.js)

### Logic & Formulas:
- Maintains arrays of all Heart Rate and SpO2 readings entered.
- **Average Heart Rate:** `sum(HeartRate) / count`
- **Average Oxygen Saturation:** `sum(SpO2) / count`
- **Risk Score Formula:**
  $$\text{RiskScore} = (100 - \text{SpO}_2) \times 2 + |\text{HeartRate} - 80| \times 0.5$$
- **Feedback Levels:**
  - `RiskScore <= 10`: **"SAFE"**
  - `10 < RiskScore <= 20`: **"WARNING"**
  - `RiskScore > 20`: **"DANGER"**

### Exam Sample Sequence Verification:
| Sequence | Inputs (HR, SpO2) | Avg Heart Rate | Avg SpO2 | Risk Score | Feedback |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **1st** | `80, 97` | **80** | **97** | **6.0** | **SAFE** |
| **2nd** | `78, 95` | **79** | **96** | **11** | **WARNING** |
| **3rd** | `130, 80` | **96** | **90.67** | **65** | **DANGER** |

---

## Question 2: PHP Mars Rover Battery Modules Calculator [10 Marks]
- **Folder:** [`q2/`](./q2/)
- **Files:** [`index.html`](./q2/index.html), [`calculate.php`](./q2/calculate.php)

### Logic & Formulas:
1. **Total Energy Required:** `Mission Distance * Energy Consumption per Meter`
2. **Battery Modules:** `ceil(Total Energy Required / Battery Module Capacity)`
3. **Total Carried Energy:** `Battery Modules * Battery Module Capacity`
4. **Unused Energy Capacity:** `Total Carried Energy - Total Energy Required`
5. **Efficiency Classification:**
   - Unused energy $\le 10\%$ of total carried energy: **Efficient**
   - Unused energy $> 10\%$ and $\le 25\%$ of total carried energy: **Acceptable**
   - Unused energy $> 25\%$ of total carried energy: **Wasteful**

### Exam Sample Verification:
| Mission Dist | Energy / m | Battery Cap | Total Req | Battery Modules | Unused Energy | Status |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| 1200 | 8 | 5000 | **9600** | **2** | **400** | **Efficient** |
| 1500 | 9 | 4000 | **13500** | **4** | **2500** | **Acceptable** |
| 1000 | 6 | 5000 | **6000** | **2** | **4000** | **Wasteful** |

Run in CLI:
```bash
php calculate.php
```

---

## Question 3: PHP & MySQL UIU Bookshop Management [10 Marks]
- **Folder:** [`q3/`](./q3/)
- **Files:** [`schema.sql`](./q3/schema.sql), [`index.php`](./q3/index.php)
- **Database:** `uiu_bookshop` | **Table:** `book_info`

### SQL Tasks:
1. **Display all books from Programming category sorted by Price DESC:**
   ```sql
   SELECT BookID, BookTitle, Author, Category, Price, Stock
   FROM book_info
   WHERE Category = 'Programming'
   ORDER BY Price DESC;
   ```
2. **Programming books where Price > 400 BDT:**
   ```sql
   SELECT BookTitle, Author, Price
   FROM book_info
   WHERE Price > 400.00 AND Category = 'Programming';
   ```
3. **Number of books available in each Category:**
   ```sql
   SELECT Category, COUNT(*) AS TotalBooksAvailable
   FROM book_info
   GROUP BY Category;
   ```
4. **Total net worth of the entire bookshop:**
   ```sql
   SELECT SUM(Price * Stock) AS TotalNetWorth
   FROM book_info;
   ```
5. **Apply 10% price reduction to 'Language' category and display updated prices:**
   ```sql
   UPDATE book_info
   SET Price = Price * 0.90
   WHERE Category = 'Language';

   SELECT BookTitle, Price AS UpdatedPrice
   FROM book_info
   WHERE Category = 'Language';
   ```
