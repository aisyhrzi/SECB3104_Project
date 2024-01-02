<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Econsave Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
        }

        .complete-btn {
            background-color: #4CAF50;
            color: white;
        }

        .incomplete-btn {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Foodbank";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select data from the econsave_details table
$sql = "SELECT id, username_receiver, email, foodName, foodQuantity FROM econsave_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display table headers
    echo "<table>";
    echo "<tr><th>ID</th><th>Username Receiver</th><th>Email</th><th>Food Name</th><th>Food Quantity</th><th>Actions</th></tr>";

    // Display data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["username_receiver"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["foodName"] . "</td>";
        echo "<td>" . $row["foodQuantity"] . "</td>";
        echo "<td>
                <button class='complete-btn' onclick='completeRequest(" . $row["id"] . ")'>Complete</button>
                <button class='incomplete-btn' onclick='incompleteRequest()'>Incomplete</button>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<script>
    function completeRequest(id) {
        // Send AJAX request to delete the row with the given ID
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page after successful completion
                location.reload();
            }
        };
        xhr.open("GET", "complete_request.php?id=" + id, true);
        xhr.send();
    }

    function incompleteRequest() {
        alert("The request status is still not complete.");
    }
</script>

</body>
</html>
