<!DOCTYPE html>
<html>
<head>
  <title>Mars Rover Battery Calculator</title>
</head>
<body>
  <h2>Mars Rover Battery Calculator</h2>
  <form method="POST">
    Mission Distance (m): <input type="number" name="distance" required><br><br>
    Energy per Meter: <input type="number" name="energyPerMeter" required><br><br>
    Battery Capacity: <input type="number" name="batteryCapacity" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    echo "<h3>Rover Battery Results</h3>";
    echo "<p>Total Energy Required: " . $totalRequired . "</p>";
    echo "<p>Battery Modules: " . $modules . "</p>";
    echo "<p>Unused Energy: " . $unusedEnergy . "</p>";
    echo "<p>Status: " . $status . "</p>";
}
?>
</body>
</html>
