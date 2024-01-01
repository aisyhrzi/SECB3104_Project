<!DOCTYPE HTML>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Receipt</title><head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .receipt-container {
            width: 300px;
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        h2 {
            color: #8d4004;
            margin-bottom: 10px;
        }

        .bill-details {
            font-size: 14px;
            color: #6C757D;
            margin-bottom: 15px;
        }

        .thank-you {
            font-size: 18px;
            color: orange;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .donor-name {
            font-size: 16px;
            color: #8d4004;
            margin-bottom: 15px;
        }

        .amount-details {
            font-size: 14px;
            color: #8d4004;
            margin-bottom: 15px;
        }

        .back-to-home {
            text-decoration: none;
            color: #ffffff;
            background-color: #FF7F50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .back-to-home:hover {
            background-color: #CC6640;
        }
    </style>
</head>



<body>
<?php
    // Retrieve user details from the URL parameter
    if (isset($_GET["user_id"])) {
        $user_id = $_GET["user_id"];
    } else {
        // Handle the case when "user_id" is not set, for example, redirect the user or show an error message.
        echo "User ID is not provided.";
        exit(); // Stop further execution to avoid the fatal error below.
    }
    
    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodbank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user details from the database
    $result = $conn->query("SELECT * FROM details WHERE user_id = $user_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <!-- Your receipt HTML with dynamic data -->
        <div class="receipt-container">
            <img src="https://i.pinimg.com/736x/fc/46/f5/fc46f5d96252f22b456ec4b81298398c.jpg" alt="Logo" class="logo">
            <h2>Donation Receipt</h2>
            <div class="bill-details">
                <p><strong>Date:</strong> <span id="current-date"></span></p>
                <p><strong>Transaction ID:</strong> <span id="transaction-id"></span></p>
            </div>
            <div class="thank-you">Thank you for your donation!</div>
            <p class="donor-name"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></p>
<?php
        // Fetch additional details from the userdetails table
        $result = $conn->query("SELECT * FROM userdetails WHERE user_id = $user_id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>
            <p>Your generous contribution will make a difference.</p>
            <p class="amount-details"><strong>Amount:</strong> $<?php echo number_format($row["donate"], 2); ?></p>

            <!-- Rest of your receipt HTML -->

            <a href="paymentgetaway.php?user_id=<?php echo $user_id; ?>&donate=<?php echo $row['donate']; ?>" class="back-to-home">Procced to Payment</a>
        </div>
<?php
        } else {
            echo "User details not found.";
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
?>
    <!-- " class="back-to-home">Proceed to Payment</a> -->
    <script>
        // JavaScript to display the current date
        const currentDate = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = currentDate.toLocaleDateString('en-US', options);

        // JavaScript to generate a random transaction ID
        const transactionId = Math.random().toString(36).substr(2, 10);
        document.getElementById('transaction-id').textContent = transactionId;
    </script>
</body>
</html>
