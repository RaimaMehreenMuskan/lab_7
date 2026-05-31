<!DOCTYPE html>
<html lang="en">
<head>
    <title>Car Database Management</title>
    <meta charset="utf-8">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px;
            background: #f0f2f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<div class="container">

<h1>🚗 Car Database</h1>

<?php
require_once "settings.php";

/* ✅ FIXED CONNECTION (important) */
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* Query */
$sql = "SELECT * FROM cars ORDER BY make, model";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    echo "<table>";
    echo "<tr>
            <th>Car ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
            <th>Year</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['car_id'] . "</td>";
        echo "<td>" . $row['make'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>$" . $row['price'] . "</td>";
        echo "<td>" . $row['yom'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center;'>There are no cars to display.</p>";
}

mysqli_close($conn);
?>

</div>
</body>
</html>