<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the "UserDetails" table if it doesn't exist
$sqlUserDetails = "CREATE TABLE IF NOT EXISTS UserDetails (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    phone_number INT(12),
    donate FLOAT(6)
)";


if (mysqli_query($conn, $sqlUserDetails)) {
    echo "Tables created successfully or already exist<br>";
} else {
    echo "Error creating tables: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
