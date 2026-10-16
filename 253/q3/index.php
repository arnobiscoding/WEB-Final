<?php
$conn = @new mysqli('127.0.0.1', 'root', '', 'campus_library', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'campus_library');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Total books for statuses with > 1 entry
echo "<h3>Status Counts (Having > 1)</h3>";
$q1 = $conn->query("SELECT Status, COUNT(*) AS total FROM book_loans GROUP BY Status HAVING COUNT(*) > 1");
while ($row = $q1->fetch_assoc()) {
    echo $row['Status'] . " - " . $row['total'] . "<br>";
}

// 2. Grant Grace Period to overdue loans under 7 days
$conn->query("UPDATE book_loans SET Status = 'Grace Period', PenaltyFee = 0.00 WHERE Status = 'Overdue' AND DaysOverdue < 7");

// 3. Add 10% processing charge for fees > 20 (max 50)
$conn->query("UPDATE book_loans SET PenaltyFee = PenaltyFee * 1.10 WHERE PenaltyFee > 20.00 AND (PenaltyFee * 1.10) <= 50.00");

// 4. Total penalty fee per book sorted descending
echo "<h3>Total Penalty Fee per Book</h3>";
$q4 = $conn->query("SELECT BookTitle, SUM(PenaltyFee) AS total FROM book_loans GROUP BY BookTitle ORDER BY total DESC");
while ($row = $q4->fetch_assoc()) {
    echo $row['BookTitle'] . " - " . $row['total'] . "<br>";
}

$conn->close();
?>
