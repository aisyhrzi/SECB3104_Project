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

    // Retrieve existing information
    $sql = "SELECT * FROM distribution_events_t WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $info = $result->fetch_assoc();
    
    // Display update form with pre-filled values
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Info</title>
    </head>
    <body>
        <h2>Update Information</h2>
        <form action="update_restaurant.php" method="post">
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
            Volunteer Name: <input type="text" name="name" value="<?php echo $info['name']; ?>"><br>
            Date: <input type="text" name="date" value="<?php echo $info['date']; ?>"><br>
            Time: <input type="text" name="time" value="<?php echo $info['time']; ?>"><br>
            Pickup Location: <input type="text" name="locationPU" value="<?php echo $info['locationPU']; ?>"><br>
            Dropoff Location: <input type="text" name="locationDO" value="<?php echo $info['locationDO']; ?>"><br>
            <input type="submit" value="Update">
        </form>
    </body>
    </html>
    <?php

    $stmt->close();
} else {
    echo "Information ID not provided";
}

$conn->close();
?>