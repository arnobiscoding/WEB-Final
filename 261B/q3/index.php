<?php
$conn = @new mysqli('127.0.0.1', 'root', '', 'uiu_bookshop', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'uiu_bookshop');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. All books from 'Programming' category sorted by Price DESC
echo "<h3>Programming Books (Sorted by Price DESC)</h3>";
$q1 = $conn->query("SELECT * FROM book_info WHERE Category = 'Programming' ORDER BY Price DESC");
while ($row = $q1->fetch_assoc()) {
    echo $row['BookTitle'] . " - " . $row['Author'] . " - " . $row['Price'] . "<br>";
}

// 2. Programming books where Price > 400
echo "<h3>Programming Books with Price > 400</h3>";
$q2 = $conn->query("SELECT BookTitle, Author, Price FROM book_info WHERE Price > 400.00 AND Category = 'Programming'");
while ($row = $q2->fetch_assoc()) {
    echo $row['BookTitle'] . " - " . $row['Author'] . " - " . $row['Price'] . "<br>";
}

// 3. Number of books in each Category
echo "<h3>Books in Each Category</h3>";
$q3 = $conn->query("SELECT Category, COUNT(*) AS total FROM book_info GROUP BY Category");
while ($row = $q3->fetch_assoc()) {
    echo $row['Category'] . " - " . $row['total'] . "<br>";
}

// 4. Total net worth of bookshop: SUM(Price * Stock)
echo "<h3>Total Net Worth</h3>";
$q4 = $conn->query("SELECT SUM(Price * Stock) AS total_net_worth FROM book_info");
$row = $q4->fetch_assoc();
echo "Total Net Worth: " . $row['total_net_worth'] . " BDT<br>";

// 5. 10% price reduction to 'Language' category and display updated prices
$conn->query("UPDATE book_info SET Price = Price * 0.90 WHERE Category = 'Language'");
echo "<h3>Updated Language Book Prices</h3>";
$q5 = $conn->query("SELECT BookTitle, Price FROM book_info WHERE Category = 'Language'");
while ($row = $q5->fetch_assoc()) {
    echo $row['BookTitle'] . " - " . $row['Price'] . "<br>";
}

$conn->close();
?>
