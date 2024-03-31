<?php
// Connect to the database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank"; // Update to your existing database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if information ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute SQL to delete the record
    $sql = "DELETE FROM distribution_events_t WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Information ID not provided";
}

$conn->close();
?>