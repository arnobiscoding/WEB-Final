<!DOCTYPE html>
<html>
<head>
  <title>Student Marks Processor</title>
</head>
<body>
  <h2>Student Marks Processor</h2>
  <form method="POST">
    CT 1: <input type="number" step="any" name="ct1" required><br><br>
    CT 2: <input type="number" step="any" name="ct2" required><br><br>
    CT 3: <input type="number" step="any" name="ct3" required><br><br>
    Midterm: <input type="number" step="any" name="midterm" required><br><br>
    Final: <input type="number" step="any" name="final" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cts = [$_POST['ct1'], $_POST['ct2'], $_POST['ct3']];
    rsort($cts);
    $bestTwoTotal = $cts[0] + $cts[1];
    $midterm = $_POST['midterm'];
    $final = $_POST['final'];
    $total = $bestTwoTotal + $midterm + $final;
    $status = ($total > 54) ? "Passed" : "Failed";

    echo "<h3>Result</h3>";
    echo "Best two CT's total: " . $bestTwoTotal . "<br>";
    echo "Midterm marks: " . $midterm . "<br>";
    echo "Final marks: " . $final . "<br>";
    echo "Total Marks: " . $total . "<br>";
    echo "Status: " . $status . "<br>";
}
?>
</body>
</html>
