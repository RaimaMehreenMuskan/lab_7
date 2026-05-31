<?php
require_once("settings.php");

// Connect
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}

echo "<h2>✅ Database Connected Successfully</h2>";

// Query 1: Show all cars
echo "<h3>All Cars</h3>";
$result1 = mysqli_query($conn, "SELECT * FROM cars");

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";

if ($result1 && mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        echo "<tr>";
        echo "<td>{$row['car_id']}</td>";
        echo "<td>{$row['make']}</td>";
        echo "<td>{$row['model']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "<td>{$row['yom']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data</td></tr>";
}
echo "</table><br>";

// Query 2: Price >= 20000
echo "<h3>Cars Price ≥ 20000</h3>";
$result2 = mysqli_query($conn, "SELECT make, model FROM cars WHERE price >= 20000");

while ($row = mysqli_fetch_assoc($result2)) {
    echo $row['make'] . " - " . $row['model'] . "<br>";
}

// Query 3: Average Price
echo "<h3>Average Price per Make</h3>";
$result3 = mysqli_query($conn, "SELECT make, AVG(price) AS avg_price FROM cars GROUP BY make");

while ($row = mysqli_fetch_assoc($result3)) {
    echo $row['make'] . " → $" . round($row['avg_price']) . "<br>";
}

mysqli_close($conn);
?>