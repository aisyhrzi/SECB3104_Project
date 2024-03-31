<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Info</title>
    <style>
    /* Center the table */
    #infoDisplay {
        max-width: 90%;
        text-align: center;
        margin: 0 auto; /* Center the container horizontally using auto margins */
        max-height: 250px;
        overflow-y: auto;
    }

    #infoDisplay table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: #ffffff;
        border: 1px solid #ddd; /* Change border color */
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    #infoDisplay th, #infoDisplay td {
        padding: 12px; /* Increase padding for better spacing */
        border: 1px solid #ddd; /* Match border color */
        font-size: 12px; /* Adjust the font size as needed */
    }

    #infoDisplay th {
        background-color: #f2f2f2; /* Light gray background for header */
    }
</style>

</head>
<body>

<?php
// Your PHP code for fetching and displaying data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM distribution_events_h";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div id='infoDisplay'>";
    echo "<table>";
    echo "<tr><th>Name</th><th>Date</th><th>Time</th><th>Location</th><th>Restaurant Location</th><th>Pickup Location</th><th>Drop-off Location</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>" . $row["restaurant_location"] . "</td>";
        echo "<td>" . $row["locationPU"] . "</td>";
        echo "<td>" . $row["locationDO"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "No information found";
}

$conn->close();
?>

</body>
</html>
