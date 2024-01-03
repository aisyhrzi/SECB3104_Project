<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $time = $_POST['time'];
    $shoplocation = $_POST['location'];

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

    // Escape special characters to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $time = mysqli_real_escape_string($conn, $time);
    $shoplocation = mysqli_real_escape_string($conn, $shoplocation);

    // SQL query to insert data into the volunteer_requests table
    $sql = "INSERT INTO volunteer_requests (email, time, shoplocation) VALUES ('$email', '$time', '$shoplocation')";

    if ($conn->query($sql) === TRUE) {
        // Insertion successful
        // Redirect to volunteerreceipt.php
        header("Location: volunteerreceipt.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        // Insertion failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
