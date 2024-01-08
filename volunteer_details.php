<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Details</title>
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

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
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

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['donorAddress'])) {
        $donorAddress = $_GET['donorAddress'];

        $query = "SELECT * FROM donorDetails WHERE donorAddress = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $donorAddress);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='container'>";
            echo "<h1>Restaurant details</h1>";
            echo "<table>";
            $headerPrinted = false;

            while ($row = $result->fetch_assoc()) {
                if (!$headerPrinted) {
                    // Print table headers
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<th>" . htmlspecialchars($key) . "</th>";
                    }
                    echo "<th>Action</th></tr>";
                    $headerPrinted = true;
                }

                // Print table rows
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "<td>";
                echo "<button onclick='selectAction(\"" . htmlspecialchars($row['donorAddress']) . "\")'>Select</button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
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
        function selectAction(donorAddress) {
            window.location.href = "restaurant_pickup.php?donorAddres=" + encodeURIComponent(donorAddress);
        }
    </script>
</body>
</html>

    
