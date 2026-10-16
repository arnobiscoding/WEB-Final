# CSE 4165 / CSE 465 Web Programming - Final 261 SET - A (Spring 2026)

This folder contains complete and tested solutions for all questions from **Final Exam 261 SET - A**.

---

## Question 1: JavaScript Weekly Study Hours Tracker [10 Marks]
- **Folder:** [`q1/`](./q1/)
- **Files:** [`index.html`](./q1/index.html), [`script.js`](./q1/script.js)

### Logic & Requirements:
- Weekly study goal: **20 hours**.
- Stores entered subject names in an array `[English, English, Bangla, Physics]`.
- Calculates average study hours: `Total Study Hours / Number of Sessions`.
- Progress Feedback:
  - `0 – 5`: **"Start studying regularly!"**
  - `6 – 12`: **"Good progress!"**
  - `13 – 19`: **"Almost ready!"**
  - `20+`: **"Weekly goal reached!"**
- If sessions > 7 without reaching 20 hours, displays: **"Increase your study time!"**

### Exam Sample Verification:
| Sessions & Hours | Total Hours | Average Hours | Subjects | Feedback Message |
| :--- | :--- | :--- | :--- | :--- |
| `English-2, English-3, Bangla-4, Physics-5` | **14 hrs** | **3.5 hrs** | `[English, English, Bangla, Physics]` | **Almost ready!** |
| `Math-5, Physics-6, Chemistry-7, English-3` | **21 hrs** | **5.25 hrs** | `[Math, Physics, Chemistry, English]` | **Weekly goal reached!** |
| `8 sessions, total 15 hours` | **15 hrs** | **1.875 hrs** | `[Math, ...]` | **Increase your study time!** |

---

## Question 2: PHP Student Academic Tracking System [10 Marks]
- **Folder:** [`q2/`](./q2/)
- **Files:** [`index.html`](./q2/index.html), [`calculate.php`](./q2/calculate.php)

### Logic & Classification:
- **Total Credits:** `Credits per Course * Courses Completed`
- **Progress Classification:**
  - `120+`: **Excellent**
  - `90 - 119`: **Good**
  - `60 - 89`: **Average**
  - `< 60`: **Poor**
- **Target Comparison:**
  - `Above target by X`
  - `Below target by X`
  - `Target met exactly (0 difference)`

### Exam Sample Verification:
| Credits/Course | Courses Completed | Target | Total Credits | Progress | Result |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 4 | 30 | 120 | **120** | **Excellent** | **Target met exactly (0 difference)** |
| 3 | 35 | 100 | **105** | **Good** | **Above target by 5** |
| 3 | 25 | 90 | **75** | **Average** | **Below target by 15** |
| 4 | 10 | 60 | **40** | **Poor** | **Below target by 20** |

Run in CLI:
```bash
php calculate.php
```

---

## Question 3: PHP & MySQL Tourism Spot Management [10 Marks]
- **Folder:** [`q3/`](./q3/)
- **Files:** [`schema.sql`](./q3/schema.sql), [`index.php`](./q3/index.php)
- **Database:** `tourism` | **Table:** `tourist_spot`

### SQL Tasks:
1. **Spots with rating > 4.5 or name containing 'Beach' (sorted by Rating DESC):**
   ```sql
   SELECT SpotName, Region, Rating
   FROM tourist_spot
   WHERE Rating > 4.5 OR SpotName LIKE '%Beach%'
   ORDER BY Rating DESC;
   ```
2. **Update rating (+0.2) and EntryFee (+10%) for rating between 4.0 and 4.5 and EntryFee > 0:**
   ```sql
   UPDATE tourist_spot
   SET Rating = Rating + 0.2, EntryFee = EntryFee * 1.10
   WHERE Rating >= 4.0 AND Rating <= 4.5 AND EntryFee > 0;
   ```
3. **Categories with average rating > 4.4 sorted by average rating DESC:**
   ```sql
   SELECT Category, COUNT(*) AS SpotCount, AVG(Rating) AS AverageRating, SUM(VisitorsPerYear) AS TotalVisitors
   FROM tourist_spot
   GROUP BY Category
   HAVING AVG(Rating) > 4.4
   ORDER BY AverageRating DESC;
   ```
4. **Regions with estimated revenue > 1,000,000 ordered from highest to lowest:**
   ```sql
   SELECT Region, SUM(EntryFee * VisitorsPerYear) AS TotalEstimatedRevenue
   FROM tourist_spot
   GROUP BY Region
   HAVING TotalEstimatedRevenue > 1000000
   ORDER BY TotalEstimatedRevenue DESC;
   ```
