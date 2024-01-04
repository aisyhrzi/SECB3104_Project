<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('114541459_636394753643263_8315127544916484665_n.jpg') center center fixed; 
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

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Donation</h1>

        <p>Details of the latest donation:</p>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Foodbank";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM donorDetails ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['donorName']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['donorEmail']) . "</p>";
            echo "<p><strong>Phone Number:</strong> " . htmlspecialchars($row['donorPhone']) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($row['donorAddress']) . "</p>";
            echo "<p><strong>Food Name:</strong> " . htmlspecialchars($row['foodName']) . "</p>";
            echo "<p><strong>Quantity:</strong> " . htmlspecialchars($row['foodQuantity']) . "</p>";
            echo "<p><strong>Pickup Option:</strong> " . htmlspecialchars($row['pickupOption']) . "</p>";

            // Display the "Send Thank You" button
           // echo '<button onclick="sendThankYou(\'' . htmlspecialchars($row['donorEmail']) . '\')">Send To Email</button>';
        } else {
            echo "<p>No donations found.</p>";
        }

        $conn->close();
        ?>

    </div>

    <script>
        function sendThankYou(email) {
            // Placeholder for AJAX call to the server to trigger the thank you email
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        alert('Thank you email sent successfully to ' + email);
                    } else {
                        alert('Error sending thank you email');
                    }
                }
            };
            xhr.open('GET', 'send_thank_you.php?email=' + encodeURIComponent(email), true);
            xhr.send();
        }
    </script>
</body>
</html>




        










