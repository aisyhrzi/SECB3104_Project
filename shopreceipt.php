<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Shop</title>
    <!-- Add this inside the head tag to include some basic styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .app {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .app-body-main-content {
            padding: 20px;
            flex-grow: 1;
        }

        .request-volunteer-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .request-volunteer-form h3 {
            text-align: center;
            color: #333;
        }

        .request-volunteer-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .request-volunteer-form input,
        .request-volunteer-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .request-volunteer-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none; /* Remove default arrow in some browsers */
            background-color: white;
            background-image: url('path-to-your-custom-icon.png'); /* Add a custom arrow icon */
            background-position: right center;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        /* Style for the custom arrow icon */
        .request-volunteer-form select::-ms-expand {
            display: none;
        }

        .request-volunteer-form button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .request-volunteer-form button:hover {
            background-color: #45a049;
        }

        /* Style for the receipt form */
        .receipt-form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .receipt-form h3 {
            text-align: center;
            color: #333;
        }

        .receipt-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .receipt-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .receipt-form button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .receipt-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="logo.png" />
                    </span>
                    <h1 class="logo-title">
                        <br>
                        <span>FoodBank.MY</span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                    <a href="dashboard.php">Dashboard</a>
                    <a href="shop.php" class="active">Shop</a>
                    <a href="volunteer.php">Volunteer</a>
                    <a href="donation.php">Donation</a>
                    <a href="notification.php">Notification</a>
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Hi Aisyah</span>
                    <span></span>
                </button>
            </div>
        </header>
        <div class="app-body-main-content">
            <section class="service-section">
                <br>
                <h2>Shop</h2>
                <div class="service-section-header">
                    <div class="request-volunteer-form">
                        <!-- Your existing form content -->

                        <!-- PHP code to fetch data from the database -->
                        <?php
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

                        // Assuming you have a table named 'econsave_request' with columns 'econsave_food' and 'econsave_quantity'
                        $sql = "SELECT econsave_food, econsave_quantity, econsave_expiry FROM econsave_request ORDER BY id DESC LIMIT 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Fetch the data
                            $row = $result->fetch_assoc();
                            $foodName = $row['econsave_food'];
                            $quantity = $row['econsave_quantity'];
                            $expiryDate = $row['econsave_expiry'];
                        } else {
                            // Set default values if no data is found
                            $foodName = "Default Food";
                            $quantity = "0";
                            $expiryDate = "N/A";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>

                        <!-- Button to show receipt form -->
                        <button onclick="showReceiptForm()">Show Receipt</button>
                    </div>
                </div>

                <!-- Receipt Form -->
                <div class="receipt-form" id="receiptForm" style="display: none;">
                    <h3>Receipt</h3>
                    <form action="billf.php" method="post">
                        <label for="foodName">Food Name:</label>
                        <input type="text" id="foodName" name="foodName" value="<?php echo $foodName; ?>" readonly>

                        <label for="quantity">Quantity:</label>
                        <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" readonly>

                        <label for="quantity">Best Before:</label>
                        <input type="text" id="expiryDate" name="expiryDate" value="<?php echo $expiryDate; ?>" readonly>

                        <button type="submit">OK</button>
                    </form>
                </div>
                <!-- End Receipt Form -->
            </section>
        </div>
    </div>

    <script>
        function showReceiptForm() {
            // Update the values using PHP variables
            var foodName = "<?php echo $foodName; ?>";
            var quantity = "<?php echo $quantity; ?>";
            var expiryDate = "<?php echo $expiryDate; ?>";

            // Update the fields in the receipt form
            document.getElementById("foodName").value = foodName;
            document.getElementById("quantity").value = quantity;
            document.getElementById("expiryDate").value = expiryDate;

            // Display the receipt form
            document.getElementById("receiptForm").style.display = "block";
        }

        function confirmReceipt() {
            // You can add logic to handle the confirmation, e.g., submitting the receipt to the server
            alert("Receipt confirmed!");
        }
    </script>
</body>
</html>
