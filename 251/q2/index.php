<!DOCTYPE html>
<html>
<head>
  <title>Venue Budget Calculator</title>
</head>
<body>
  <h2>Venue Budget Calculator</h2>
  <form method="POST">
    Attendees: <input type="number" name="attendees" required><br><br>
    Cost per Person: <input type="number" name="costPerPerson" required><br><br>
    Venue Capacity: <input type="number" name="venueCapacity" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $attendees = $_POST['attendees'];
    $cost = $_POST['costPerPerson'];
    $capacity = $_POST['venueCapacity'];

    $totalVenues = ceil($attendees / $capacity);
    $emptySeats = ($totalVenues * $capacity) - $attendees;
    $wastedMoney = $emptySeats * $cost;

    echo "<h3>Calculation Result</h3>";
    echo "<p>Total Venues: " . $totalVenues . "</p>";
    echo "<p>Empty Seats: " . $emptySeats . "</p>";
    echo "<p>Wasted Money: " . $wastedMoney . " BDT</p>";
}
?>
</body>
</html>
