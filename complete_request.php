<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Foodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the query parameter
$id = $_GET['id'];

// Query to delete the row with the given ID
$sql = "DELETE FROM econsave_details WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "The request is completed";
} else {
    echo "Status Complete " . $conn->error;
}

$conn->close();
?>
