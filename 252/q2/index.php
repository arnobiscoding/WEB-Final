<!DOCTYPE html>
<html>
<head>
  <title>Movie Night Calculator</title>
</head>
<body>
  <h2>Movie Night Screen Calculator</h2>
  <form method="POST">
    Attendees: <input type="number" name="attendees" required><br><br>
    Seat Capacity: <input type="number" name="seatCapacity" required><br><br>
    Ticket Price: <input type="number" name="ticketPrice" required><br><br>
    <button type="submit">Calculate</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $attendees = $_POST['attendees'];
    $capacity = $_POST['seatCapacity'];
    $price = $_POST['ticketPrice'];

    $totalScreens = ceil($attendees / $capacity);
    $emptySeats = ($totalScreens * $capacity) - $attendees;
    $wastedMoney = $emptySeats * $price;

    echo "<h3>Calculation Result</h3>";
    echo "<p>Total Screens: " . $totalScreens . "</p>";
    echo "<p>Empty Seats: " . $emptySeats . "</p>";
    echo "<p>Wasted Money: " . $wastedMoney . " BDT</p>";
}
?>
</body>
</html>
