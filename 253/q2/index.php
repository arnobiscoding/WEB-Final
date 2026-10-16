<!DOCTYPE html>
<html>
<head>
  <title>Sales Tracker</title>
</head>
<body>
  <h2>Event Planning Sales Tracker</h2>
  <form method="POST">
    Items Sold per Day: <input type="number" name="itemsSoldPerDay" required><br><br>
    Number of Days: <input type="number" name="numberOfDays" required><br><br>
    Target Items: <input type="number" name="targetItems" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $daily = $_POST['itemsSoldPerDay'];
    $days = $_POST['numberOfDays'];
    $target = $_POST['targetItems'];

    $total = $daily * $days;

    if ($total >= 400) {
        $performance = "Excellent";
    } elseif ($total >= 300) {
        $performance = "Good";
    } elseif ($total >= 150) {
        $performance = "Average";
    } else {
        $performance = "Poor";
    }

    $diff = abs($total - $target);
    if ($total == $target) {
        $result = "Target met exactly (0 difference)";
    } elseif ($total > $target) {
        $result = "Above target by $diff items";
    } else {
        $result = "Below target by $diff items";
    }

    echo "<h3>Sales Performance Result</h3>";
    echo "<p>Total Items Sold: " . $total . "</p>";
    echo "<p>Performance: " . $performance . "</p>";
    echo "<p>Result: " . $result . "</p>";
}
?>
</body>
</html>
