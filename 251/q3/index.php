<?php
$conn = @new mysqli('127.0.0.1', 'root', '', 'uiutech_final', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'uiutech_final');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Total employees per performance rating
echo "<h3>Employees per Performance Rating</h3>";
$q1 = $conn->query("SELECT PerformanceRating, COUNT(*) AS total FROM employee_final GROUP BY PerformanceRating");
while ($row = $q1->fetch_assoc()) {
    echo $row['PerformanceRating'] . " - " . $row['total'] . "<br>";
}

// 2. Update rating to 'C' for salary < 40000 (if not 'D')
$conn->query("UPDATE employee_final SET PerformanceRating = 'C' WHERE Salary < 40000 AND PerformanceRating != 'D'");

// 3. Add 5,000 bonus for salary > 50000 if new salary <= 60000
$conn->query("UPDATE employee_final SET Salary = Salary + 5000 WHERE Salary > 50000 AND (Salary + 5000) <= 60000");

// 4. Department names and employee counts (descending)
echo "<h3>Department Employee Counts</h3>";
$q4 = $conn->query("SELECT DepartmentName, COUNT(*) AS num FROM employee_final GROUP BY DepartmentName ORDER BY num DESC");
while ($row = $q4->fetch_assoc()) {
    echo $row['DepartmentName'] . " - " . $row['num'] . "<br>";
}

$conn->close();
?>
