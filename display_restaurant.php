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

// Retrieve information from the database
$sql = "SELECT * FROM distribution_events_r";
$result = $conn->query($sql);

// Display the information
if ($result->num_rows > 0) {
    echo "<div id='infoDisplay'>"; // Add a container div
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Date</th><th>Time</th><th>Restaurant Location</th><th colspan='2' >Adjustments</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["time"] . "</td>";
        echo "<td>" . $row["restaurant_location"] . "</td>";
        echo '<td><button onclick="deleteInfoR(' . $row['id'] . ')">Delete</button></td>';
        echo '<td><button onclick="updateInfoR(' . $row['id'] . ')">Update</button></td>';
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>"; // Close the container div
} else {
    echo "No information found";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Info</title>
    <style>
    /* Styles for the modal */
    .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
            max-width: 80%; /* Set a maximum width if needed */
            width: auto; /* Allow the width to adjust based on content */
            text-align: center; /* Center the content horizontally */
        }

        /* Center the table and apply styling to the container */
    #infoDisplay {
        margin: 20px auto; /* Set top and bottom margin to 20px, and left and right margin to auto */
        max-width: 90%; /* Adjust the maximum width as needed */
        text-align: center; /* Center the content horizontally */
        background-color: #ffffff; /* Change background color */
        padding: 15px; /* Adjusted padding for better visual appearance */
        border: 1px solid #ddd; /* Change border color */
        border-radius: 10px; /* Optional: Add rounded corners to the background */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        max-height: 300px;
        overflow-y: auto;
    }

    #infoDisplay table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: #ffffff;
        border: 1px solid #ddd; /* Change border color */
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    #infoDisplay th, #infoDisplay td {
        padding: 12px; /* Increase padding for better spacing */
        border: 1px solid #ddd; /* Match border color */
    }

    #infoDisplay th {
        background-color: #f2f2f2; /* Light gray background for header */
    }
</style>
</head>
<body>

<!-- The Modal -->
<div id="infoModal" class="modal">
    <!-- Modal content -->
    <h2>Information</h2>
    <p>Volunteer Name: <?php echo $result['name']; ?></p>
    <p>Date: <?php echo $result['date']; ?></p>
    <p>Time: <?php echo $result['time']; ?></p>
    <p>Restaurant Location: <?php echo $result['restaurant_location']; ?></p>
    <!-- Close button -->
    <button onclick="closeModal()">Close</button>
</div>

<!-- Include your JavaScript at the end of the body -->
<script>
    function displayInfoR() {
    console.log("Button clicked");
    // Rest of your code
    }
    // Function to open the modal
    function openModal() {
        document.getElementById('infoModal').style.display = 'block';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('infoModal').style.display = 'none';
    }

    // Call openModal() when the page loads to automatically open the modal
    window.onload = openModal;
</script>
</body>
</html>