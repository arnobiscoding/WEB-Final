<?php
$conn = @new mysqli('127.0.0.1', 'root', '', 'sundarban', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'sundarban');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Total revenue per category
echo "<h3>Total Revenue per Category</h3>";
$q1 = $conn->query("SELECT CategoryName, SUM(Revenue) AS total FROM sales_data GROUP BY CategoryName");
while ($row = $q1->fetch_assoc()) {
    echo $row['CategoryName'] . " - " . $row['total'] . "<br>";
}

// 2. Update category to 'Low Performing' if revenue < 40000
$conn->query("UPDATE sales_data SET CategoryName = 'Low Performing' WHERE Revenue < 40000");

// 3. 10% bonus revenue if revenue > 70000
$conn->query("UPDATE sales_data SET Revenue = Revenue * 1.10 WHERE Revenue > 70000");

// 4. Product, category, and Top/Regular Seller based on category average
echo "<h3>Product Seller Status</h3>";
$avg = [];
$resAvg = $conn->query("SELECT CategoryName, AVG(Revenue) AS avg_rev FROM sales_data GROUP BY CategoryName");
while ($r = $resAvg->fetch_assoc()) {
    $avg[$r['CategoryName']] = $r['avg_rev'];
}

$q4 = $conn->query("SELECT ProductName, CategoryName, Revenue FROM sales_data");
while ($row = $q4->fetch_assoc()) {
    $label = ($row['Revenue'] > $avg[$row['CategoryName']]) ? "Top Seller" : "Regular Seller";
    echo $row['ProductName'] . " - " . $row['CategoryName'] . " - " . $label . "<br>";
}

$conn->close();
?>
