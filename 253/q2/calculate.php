<?php
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
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
</head>
<body>
  <h2>Sales Performance Result</h2>
  <p>Total Items Sold: <?php echo $total; ?></p>
  <p>Performance: <?php echo $performance; ?></p>
  <p>Result: <?php echo $result; ?></p>
  <a href="index.html">Back</a>
</body>
</html>
