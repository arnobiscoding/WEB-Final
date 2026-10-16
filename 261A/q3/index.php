<?php
$conn = @new mysqli('127.0.0.1', 'root', '', 'tourism', 3307);
if ($conn->connect_error) {
    $conn = new mysqli('localhost', 'root', '', 'tourism');
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Spots with rating > 4.5 OR name containing 'Beach' (sorted by Rating DESC)
echo "<h3>Spots (Rating > 4.5 or Beach)</h3>";
$q1 = $conn->query("SELECT SpotName, Region, Rating FROM tourist_spot WHERE Rating > 4.5 OR SpotName LIKE '%Beach%' ORDER BY Rating DESC");
while ($row = $q1->fetch_assoc()) {
    echo $row['SpotName'] . " - " . $row['Region'] . " - " . $row['Rating'] . "<br>";
}

// 2. Update rating (+0.2) and EntryFee (+10%) for rating between 4.0 and 4.5 and EntryFee > 0
$conn->query("UPDATE tourist_spot SET Rating = Rating + 0.2, EntryFee = EntryFee * 1.10 WHERE Rating >= 4.0 AND Rating <= 4.5 AND EntryFee > 0");

// 3. Categories with average rating > 4.4 sorted by average rating DESC
echo "<h3>Categories with Avg Rating > 4.4</h3>";
$q3 = $conn->query("SELECT Category, COUNT(*) AS SpotCount, AVG(Rating) AS AverageRating, SUM(VisitorsPerYear) AS TotalVisitors FROM tourist_spot GROUP BY Category HAVING AVG(Rating) > 4.4 ORDER BY AverageRating DESC");
while ($row = $q3->fetch_assoc()) {
    echo $row['Category'] . " - Spots: " . $row['SpotCount'] . " - Avg: " . $row['AverageRating'] . " - Visitors: " . $row['TotalVisitors'] . "<br>";
}

// 4. Regions with estimated revenue > 1,000,000 ordered from highest to lowest
echo "<h3>Regions with Revenue > 1,000,000</h3>";
$q4 = $conn->query("SELECT Region, SUM(EntryFee * VisitorsPerYear) AS TotalRevenue FROM tourist_spot GROUP BY Region HAVING TotalRevenue > 1000000 ORDER BY TotalRevenue DESC");
while ($row = $q4->fetch_assoc()) {
    echo $row['Region'] . " - " . $row['TotalRevenue'] . "<br>";
}

$conn->close();
?>
