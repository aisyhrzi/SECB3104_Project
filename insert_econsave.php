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

    // Retrieve values from the form
    $foodName = $_POST['food_item'];
    $quantityAvailable = $_POST['quantity'];
    $expiryDate = $_POST['best_before'];

    // Retrieve the current foodQuantity from the database
    $sqlSelect = "SELECT foodQuantity FROM donordetails WHERE foodName = '$foodName'";
    $resultSelect = $conn->query($sqlSelect);

    if ($resultSelect->num_rows > 0) {
        $row = $resultSelect->fetch_assoc();
        $currentQuantity = $row["foodQuantity"];

        // Check if there's enough quantity available
        if ($currentQuantity >= $quantityAvailable) {
            // Calculate the updated quantity
            $updatedQuantity = $currentQuantity - $quantityAvailable;

            // Update the database with the new quantity
            $sqlUpdate = "UPDATE donordetails SET foodQuantity = '$updatedQuantity' WHERE foodName = '$foodName'";
            if ($conn->query($sqlUpdate) === TRUE) {
                // Insert the request into econsave_request table
                $sqlInsert = "INSERT INTO econsave_request (econsave_food, econsave_quantity, econsave_expiry) VALUES ('$foodName', '$quantityAvailable', '$expiryDate')";
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
