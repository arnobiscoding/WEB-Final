<?php
$attendees = $_POST['attendees'];
$capacity = $_POST['seatCapacity'];
$price = $_POST['ticketPrice'];

$totalScreens = ceil($attendees / $capacity);
$emptySeats = ($totalScreens * $capacity) - $attendees;
$wastedMoney = $emptySeats * $price;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Result</title>
</head>
<body>
  <h2>Movie Night Result</h2>
  <p>Total Screens: <?php echo $totalScreens; ?></p>
  <p>Empty Seats: <?php echo $emptySeats; ?></p>
  <p>Wasted Money: <?php echo $wastedMoney; ?> BDT</p>
  <a href="index.html">Back</a>
</body>
</html>
