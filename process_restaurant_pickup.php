<?php
// Replace these values with your actual database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "foodbank";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["restaurant_location"];  // Updated variable name

    // Escape special characters to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);
    $location = mysqli_real_escape_string($conn, $location);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO distribution_events_r (name, date, time, restaurant_location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $date, $time, $location);

    // Set parameters and execute
    $name = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["restaurant_location"];
    $stmt->execute();

    // Check for errors
if ($stmt->error) {
    echo "Error: " . $stmt->error;
} else {
    echo "Distribution event scheduled successfully.";
    // Add buttons for returning to home and rescheduling
    echo '<br>';
    echo '<a href="dashboard_v.php">Return to Home</a>';
    echo '&nbsp;&nbsp;';
    echo '<a href="restaurant_pickup.php">Reschedule</a>';
}

// Close statement
$stmt->close();
}

// Close connection
$conn->close();
?>