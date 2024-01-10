<?php
// get_quantity.php

// Replace these database connection details with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected food item
$selectedFoodItem = $_GET['food_item'];

// SQL query to retrieve the quantity based on the selected food item
$sql = "SELECT ayamasQuantity FROM ayamas WHERE ayamasFood = '$selectedFoodItem'";
$result = $conn->query($sql);

if (!$result) {
    // Output any SQL query errors
    echo "SQL Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // Output data of the first row
        $row = $result->fetch_assoc();
        echo $row['ayamasQuantity'];
    } else {
        echo "0";
    }
}

// Close the database connection
$conn->close();
?>
