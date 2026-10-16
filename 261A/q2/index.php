<!DOCTYPE html>
<html>
<head>
  <title>Academic Tracker</title>
</head>
<body>
  <h2>Academic Tracking System</h2>
  <form method="POST">
    Credits per Course: <input type="number" name="creditsPerCourse" required><br><br>
    Courses Completed: <input type="number" name="coursesCompleted" required><br><br>
    Target Credits: <input type="number" name="targetCredits" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creditsPerCourse = $_POST['creditsPerCourse'];
    $coursesCompleted = $_POST['coursesCompleted'];
    $targetCredits = $_POST['targetCredits'];

    $totalCredits = $creditsPerCourse * $coursesCompleted;

    if ($totalCredits >= 120) {
        $progress = "Excellent";
    } elseif ($totalCredits >= 90) {
        $progress = "Good";
    } elseif ($totalCredits >= 60) {
        $progress = "Average";
    } else {
        $progress = "Poor";
    }

    $diff = abs($totalCredits - $targetCredits);
    if ($totalCredits == $targetCredits) {
        $result = "Target met exactly (0 difference)";
    } elseif ($totalCredits > $targetCredits) {
        $result = "Above target by $diff";
    } else {
        $result = "Below target by $diff";
    }

    echo "<h3>Academic Tracking Result</h3>";
    echo "<p>Total Credits: " . $totalCredits . "</p>";
    echo "<p>Progress: " . $progress . "</p>";
    echo "<p>Result: " . $result . "</p>";
}
?>
</body>
</html>
