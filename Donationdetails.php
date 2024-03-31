<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user details from the form
    
    $phone_number = $_POST["phone_number"];
    $donate = $_POST["donate"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO UserDetails ( phone_number, donate) VALUES (?, ?)");

    // Bind parameters to the statement
    $stmt->bind_param("ss", $phone_number, $donate);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Get the user_id of the inserted record
        $id = $stmt->insert_id;

        // Close the prepared statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Redirect to the receipt page with user_id
        header("Location: DonationReceipt.php?id=$id");
        exit();
    } else {
        // Log the error
        error_log("Error adding details: " . $stmt->error);

        // Display a detailed error message
        exit("Error: " . $stmt->error);
    }
}
?>