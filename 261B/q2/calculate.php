<?php
$distance = $_POST['distance'];
$energyPerMeter = $_POST['energyPerMeter'];
$capacity = $_POST['batteryCapacity'];

$totalRequired = $distance * $energyPerMeter;
$modules = ceil($totalRequired / $capacity);
$totalCarried = $modules * $capacity;
$unusedEnergy = $totalCarried - $totalRequired;
$unusedPercent = ($unusedEnergy / $totalCarried) * 100;

if ($unusedPercent <= 10) {
    $status = "Efficient";
} elseif ($unusedPercent <= 25) {
    $status = "Acceptable";
} else {
    $status = "Wasteful";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
</head>
<body>
  <h2>Rover Battery Results</h2>
  <p>Total Energy Required: <?php echo $totalRequired; ?></p>
  <p>Battery Modules: <?php echo $modules; ?></p>
  <p>Unused Energy: <?php echo $unusedEnergy; ?></p>
  <p>Status: <?php echo $status; ?></p>
  <a href="index.html">Back</a>
</body>
</html>
