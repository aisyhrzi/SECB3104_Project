<?php
// update_quantity_and_book.php

// Replace these database connection details with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Foodbank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected food item and quantity
$selectedFoodItem = $_GET['food_item'];
$selectedQuantity = $_GET['selected_quantity'];

// Start a transaction to handle concurrency
$conn->begin_transaction();

try {
    // Retrieve the current quantity from the database
    $sqlSelect = "SELECT foodQuantity FROM donordetails WHERE foodName = '$selectedFoodItem'";
    $resultSelect = $conn->query($sqlSelect);

    if (!$resultSelect) {
        throw new Exception("SQL Error: " . $conn->error);
    }

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        $currentQuantity = $row['foodQuantity'];

        // Check if there is enough quantity
        if ($currentQuantity < $selectedQuantity) {
            throw new Exception("Not enough quantity available.");
        }

        // Update the remaining quantity
        $updatedQuantity = $currentQuantity - $selectedQuantity;
        $sqlUpdate = "UPDATE donordetails SET foodQuantity = '$updatedQuantity' WHERE foodName = '$selectedFoodItem'";
        $resultUpdate = $conn->query($sqlUpdate);

        if (!$resultUpdate) {
            throw new Exception("SQL Error: " . $conn->error);
        }

        // Commit the transaction
        $conn->commit();

        // Return the updated quantity
        echo $updatedQuantity;
    } else {
        throw new Exception("Food item not found.");
    }
} catch (Exception $e) {
    // Rollback the transaction in case of an exception
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>
