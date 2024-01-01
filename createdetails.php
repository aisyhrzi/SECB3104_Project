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
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    phone_number INT(12),
    donate FLOAT(6)
)";

// Create the "details" table if it doesn't exist
$sqlDetails = "CREATE TABLE IF NOT EXISTS details (
    user_id INT(11)AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email_id VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sqlUserDetails) && mysqli_query($conn, $sqlDetails)) {
    echo "Tables created successfully or already exist<br>";
} else {
    echo "Error creating tables: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
