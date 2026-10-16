# UIU Web Programming Final Exam — 2-Page Master Cheatsheet
> **Covers 100% of Exam Patterns:** Q1 (JavaScript Application), Q2 (PHP Business Math), Q3 (PHP & MySQL).

---

# 📄 PAGE 1: JavaScript (Q1) & PHP Numerical Modeling (Q2)

## 1. QUESTION 1: Barebones JavaScript Master Pattern [10 Marks]
*Tests: DOM extraction, state tracking (running total/arrays), multi-tier grading, and threshold alerts.*

### A. The 4 Math / Logic Patterns You Will Face
| Pattern Type | Exam Examples | Formula / Core Logic |
| :--- | :--- | :--- |
| **Accumulator** | Calories (252), Study Hours (261A) | `total += val; count++; let avg = total / count;` |
| **Point Scoring** | Password Strength (251) | `if (/[A-Z]/.test(pass)) score += 15;` |
| **Formula Metric** | Patient Risk Score (261B) | `let risk = (100 - spo2) * 2 + Math.abs(hr - 80) * 0.5;` |
| **Threshold Alert** | *In 100% of exams!* | `if (count > LIMIT && total < GOAL) { msg = "Warning!"; }` |

### B. Plug-and-Play JavaScript Template (Barebones & Easy to Memorize)
```html
<!-- index.html -->
<input type="number" id="val" placeholder="Enter number">
<button onclick="calculate()">Submit</button>

<p id="total">Total: 0</p>
<p id="count">Count: 0</p>
<p id="feedback"></p>
<p id="warning" style="color:red;"></p>

<script src="script.js"></script>
```
```javascript
// script.js
let total = 0;
let count = 0;
let items = [];

function calculate() {
  let val = Number(document.getElementById("val").value);
  total += val;
  count++;
  items.push(val);

  let avg = total / count;

  // 1. Classification Ladder
  let msg = "";
  if (total <= 800) msg = "Stage 1";
  else if (total <= 1600) msg = "Stage 2";
  else msg = "Goal Reached!";

  // 2. Threshold Warning Rule (present in all exams)
  let warn = "";
  if (count > 10 && total < 2000) {
    warn = "Warning: Goal not reached within limit!";
  }

  // 3. Update DOM
  document.getElementById("total").innerText = "Total: " + total + " | Avg: " + avg.toFixed(2);
  document.getElementById("count").innerText = "Count: " + count;
  document.getElementById("feedback").innerText = msg;
  document.getElementById("warning").innerText = warn;
}
```

---

## 2. QUESTION 2: Barebones PHP Numerical Modeling [10 Marks]
*Tests: HTML form POST handling, discrete unit allocation (`ceil`), waste calculation, and output display.*

### A. The 2 PHP Problem Types
- **Discrete Unit Allocation (Venues 251, Cinema Screens 252, Rover Batteries 261B):**
  - Units needed: `ceil($demand / $capacity)` *(Must use `ceil()` — fractional units cannot exist!)*
  - Empty / Unused: `($units * $capacity) - $demand`
  - Wasted Money: `$empty * $costPerPerson`
- **Rate Multiplication & Target Comparison (Sales 253, Degree Credits 261A):**
  - Total: `$rate * $count`
  - Delta: `abs($total - $target)`
  - Status: `$total == $target ? "Target met exactly" : ($total > $target ? "Above target" : "Below target")`

### B. Plug-and-Play PHP Template
```html
<!-- index.html -->
<form action="calculate.php" method="POST">
  Demand: <input type="number" name="demand" required><br><br>
  Capacity: <input type="number" name="capacity" required><br><br>
  Cost: <input type="number" name="cost" required><br><br>
  <button type="submit">Calculate</button>
</form>
```
```php
<!-- calculate.php -->
<?php
$demand = $_POST['demand'];
$capacity = $_POST['capacity'];
$cost = $_POST['cost'];

$units = ceil($demand / $capacity);
$empty = ($units * $capacity) - $demand;
$wasted = $empty * $cost;
?>
<!DOCTYPE html>
<html>
<body>
  <h2>Results</h2>
  <p>Units Needed: <?php echo $units; ?></p>
  <p>Empty / Unused: <?php echo $empty; ?></p>
  <p>Wasted Money: <?php echo $wasted; ?> BDT</p>
  <a href="index.html">Back</a>
</body>
</html>
```

---

# 📄 PAGE 2: PHP & MySQL (Q3) + Exam Traps & Syntax Checklist

## 3. QUESTION 3: Barebones PHP & MySQL Master Pattern [10 Marks]
*Tests: Database connection, and the 4 standard SQL tasks (Aggregation, Conditional Update, Bounded Math Update, HAVING/Ordering).*

### A. The 4 Standard SQL Tasks
```sql
-- TASK 1: Aggregation with GROUP BY
SELECT Category, COUNT(*) AS TotalCount, SUM(Revenue) AS TotalRev
FROM my_table GROUP BY Category;

-- TASK 2: Conditional Update with Defensive Exclusion
UPDATE my_table 
SET Status = 'Low Performing' 
WHERE Score < 40 AND Status != 'Excluded';

-- TASK 3: Bounded Math Update (CEILING GUARD - #1 Exam Trap!)
UPDATE my_table 
SET Salary = Salary + 5000 
WHERE Salary > 50000 AND (Salary + 5000) <= 60000;
-- Or percentage: SET Price = Price * 0.90 WHERE Category = 'Language';

-- TASK 4: Group Filter with HAVING / Derived Arithmetic / Subquery
SELECT Region, SUM(Fee * Visitors) AS TotalRev 
FROM my_table 
GROUP BY Region HAVING TotalRev > 1000000 ORDER BY TotalRev DESC;
```

### B. Barebones PHP MySQLi Script (Works on both Port 3307 & Default 3306)
```php
<?php
// Connect (tries local XAMPP port 3307 first, falls back to default 3306 in lab)
$conn = @new mysqli('127.0.0.1', 'root', '', 'database_name', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'database_name');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Q1: Aggregation
$q1 = $conn->query("SELECT Category, COUNT(*) AS total FROM my_table GROUP BY Category");
while ($row = $q1->fetch_assoc()) {
    echo $row['Category'] . " - " . $row['total'] . "<br>";
}

// Q2: Defensive Update
$conn->query("UPDATE my_table SET Status = 'Low' WHERE Score < 40");

// Q3: Bounded Math Update
$conn->query("UPDATE my_table SET Salary = Salary + 5000 WHERE Salary > 50000 AND (Salary + 5000) <= 60000");

// Q4: Query with HAVING or Sorting
$q4 = $conn->query("SELECT Region, SUM(Fee * Visitors) AS rev FROM my_table GROUP BY Region HAVING rev > 1000000 ORDER BY rev DESC");
while ($row = $q4->fetch_assoc()) {
    echo $row['Region'] . " - " . $row['rev'] . "<br>";
}

$conn->close();
?>
```

---

## 4. Exam Day "Zero-Mistake" Checklist & Gotchas

| Category | Dangerous Mistake | Correct Exam Syntax | Why It Matters |
| :--- | :--- | :--- | :--- |
| **Port 3307 vs 3306** | `Access denied for root@localhost` | Use `'127.0.0.1', ..., 3307` or fallback | If your XAMPP runs on 3307, `'localhost'` connects to 3306 where another service blocks it. In lab, default `'localhost'` is fine. |
| **PHP Math** | `$venues = $att / $cap;` | `$venues = ceil($att / $cap);` | Without `ceil()`, $venues is a float (`3.125`). Partial venues cannot be booked! |
| **SQL Updates** | `WHERE Sal > 50000;` | `WHERE Sal > 50000 AND (Sal + 5000) <= 60000;` | If salary is 58,000, adding 5,000 becomes 63,000, violating the ceiling! |
| **SQL Filtering**| `WHERE COUNT(*) > 1` | `HAVING COUNT(*) > 1` | `WHERE` filters rows *before* grouping; `HAVING` filters groups *after* aggregation. |
| **HTML Forms** | Missing input `name` | `<input type="number" name="attendees">` | Without the `name` attribute, `$_POST['attendees']` is `null`. |
| **HTML Form Action**| Wrong target file | `<form action="calculate.php" method="POST">` | Ensure the `action` points exactly to your PHP script filename. |

---

## 5. Universal Set-253 Special Rule: `rsort()` Best 2 CTs
If asked to compute the **best two Class Tests** out of 3:
```php
$cts = [$_POST['ct1'], $_POST['ct2'], $_POST['ct3']];
rsort($cts); // Sorts array descending: index 0 and 1 are the two highest!
$bestTwoTotal = $cts[0] + $cts[1];
$totalMarks   = $bestTwoTotal + $_POST['midterm'] + $_POST['final'];
$status       = ($totalMarks > 54) ? "Passed" : "Failed";
```
