<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
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

    // Create ayamas_request table if not exists
    $createTableQuery = "CREATE TABLE IF NOT EXISTS ayamas_request (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ayamas_food VARCHAR(255) NOT NULL,
        ayamas_quantity INT NOT NULL,
        ayamas_expiry DATE NOT NULL
    )";
    
    if ($conn->query($createTableQuery) === FALSE) {
        echo "Error creating table: " . $conn->error;
        $conn->close();
        exit();
    }

    // Retrieve values from the form
    $ayamasFood = $_POST['food_item'];
    $ayamasQuantity = $_POST['quantity'];
    $ayamasExpiry = $_POST['best_before'];

    // Retrieve the current foodQuantity from the database
    $sqlSelect = "SELECT ayamasQuantity FROM ayamas WHERE ayamasFood = '$ayamasFood'";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        $currentQuantity = $row["ayamasQuantity"];

        // Check if there's enough quantity available
        if ($currentQuantity >= $ayamasQuantity) {
            // Calculate the updated quantity
            $updatedQuantity = $currentQuantity - $ayamasQuantity;

            // Update the database with the new quantity
            $sqlUpdate = "UPDATE ayamas SET ayamasQuantity = '$updatedQuantity' WHERE ayamasFood = '$ayamasFood'";
            if ($conn->query($sqlUpdate) === TRUE) {
                // Insert the request into ayamas_request table
                $sqlInsert = "INSERT INTO ayamas_request (ayamas_food, ayamas_quantity, ayamas_expiry) VALUES ('$ayamasFood', '$ayamasQuantity', '$ayamasExpiry')";
                if ($conn->query($sqlInsert) === TRUE) {
                    // Redirect to shopreceipt.php
                    header("Location: shopreceipt.php");
                    exit(); // Ensure that no more output is sent
                } else {
                    echo "Error inserting record: " . $conn->error;
                }
            } else {
                echo "Error updating quantity: " . $conn->error;
            }
        } else {
            echo "Not enough quantity available.";
        }
    } else {
        echo "Food item not found.";
    }

    // Close the database connection
    $conn->close();
}
?>
