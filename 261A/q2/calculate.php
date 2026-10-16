<?php
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
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
</head>
<body>
  <h2>Academic Tracking Result</h2>
  <p>Total Credits: <?php echo $totalCredits; ?></p>
  <p>Progress: <?php echo $progress; ?></p>
  <p>Result: <?php echo $result; ?></p>
  <a href="index.html">Back</a>
</body>
</html>
