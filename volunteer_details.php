<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('red-sombrero-background-food.png') center center fixed; 
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007BFF;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        p, button {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin: 10px 0;
        }

        button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <?php
    // Fetch data of the selected user
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Foodbank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['donorName'])) {
        $donorName = $_GET['donorName'];

        $query = "SELECT * FROM donorDetails WHERE donorName = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $donorName);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<h1>Thank You!</h1>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row['donorName']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($row['donorEmail']) . "</p>";
                echo "<p><strong>Address:</strong> " . htmlspecialchars($row['donorAddress']) . "</p>";
                echo "<p><strong>Food Name:</strong> " . htmlspecialchars($row['foodName']) . "</p>";
                echo "<p><strong>Food Quantity:</strong> " . htmlspecialchars($row['foodQuantity']) . "</p>";
                // Display other information as needed

                // Add the select button that will redirect to restaurant_pickup.php
                echo "<button onclick='selectAction(\"" . htmlspecialchars($row['donorName']) . "\")'>Select</button>";
            }
            echo "</div>";
        } else {
            echo "<p>No details found for the selected user.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Invalid request.</p>";
    }

    $conn->close();
    ?>

    <script>
        function selectAction(donorName) {
            window.location.href = "restaurant_pickup.php?donorName=" + encodeURIComponent(donorName);
        }
    </script>
</body>
</html>

