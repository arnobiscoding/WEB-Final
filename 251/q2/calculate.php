<?php
$attendees = $_POST['attendees'];
$cost = $_POST['costPerPerson'];
$capacity = $_POST['venueCapacity'];

$totalVenues = ceil($attendees / $capacity);
$emptySeats = ($totalVenues * $capacity) - $attendees;
$wastedMoney = $emptySeats * $cost;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
</head>
<body>
  <h2>Calculation Result</h2>
  <p>Total Venues: <?php echo $totalVenues; ?></p>
  <p>Empty Seats: <?php echo $emptySeats; ?></p>
  <p>Wasted Money: <?php echo $wastedMoney; ?> BDT</p>
  <a href="index.html">Back</a>
</body>
</html>
