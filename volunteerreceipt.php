<?php
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

// Fetch data from the volunteer_requests table
$sql = "SELECT id, email, time, shoplocation FROM volunteer_requests ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rawTime = $row['time'];
    $shoplocation = $row['shoplocation'];
    $email = $row['email'];

    // Convert raw time to a user-friendly format (e.g., from '08:00' to '8:00 AM')
    $time = date('g:i A', strtotime($rawTime));
} else {
    // Handle the case where no data is found
    $time = $shoplocation = $email = "N/A";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <title>Dashboard</title>
</head>
<style>
.center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 30%;
            align-text: center;
        }

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

        .receipt-form p {
            margin-bottom: 15px;
            color: #333;
        }

        .receipt-form button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 0 auto;
        }

        .receipt-form button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <div class="app">
        <header class="app-header">
            <div class="app-header-logo">
                <div class="logo">
                    <span class="logo-icon">
                        <img src="logo.png">
                    </span>
                    <h1 class="logo-title">
                        <br>
                        <span>FoodBank.MY</span>
                    </h1>
                </div>
            </div>
            <div class="app-header-navigation">
                <div class="tabs">
                    <a href="dashboard.php">
                        Dashboard
                    </a>
                    <a href="shop.php">
                        Shop
                    </a>
                    <a href="volunteer.php" class="active">
                        Volunteer
                    </a>
                    <a href="donation.php">
                        Donation
                    </a>
                    <a href="notification.php">
                        Notification
                    </a>
                    
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Hi Aisyah</span>
                    <span>
                        </span>
                </button>
                
    
        </header>
        
                
            
        <div class="app-body-main-content">
            <section class="service-section">
                <br>
                <h2>Dashboard</h2>
                <!-- Receipt Form -->
                <div class="receipt-form">
                    <h3>Volunteer Request Receipt</h3>
                    <!-- Display time range, location, and note here -->
                    <label for="time">Time Range:</label>
                    <p><?php echo $time; ?></p>

                    <label for="shoplocation">Location:</label>
                    <p><?php echo $shoplocation; ?></p>

                    <label for="note">Note:</label>
                    <p>Confirmation email has been sent to <?php echo $email; ?></p>

                    <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
                </div>
                <!-- End Receipt Form -->
            </section>
        </div>
                    
                <footer class="footer">
                    <h1>FoodBank.MY<small>©</small></h1>
                    <div>
                        FoodBank.MY ©<br />
                        All Rights Reserved 2023
                    </div>
                </footer>
            </div>
                
                                </div>
                            </div>
                        </div>
                        </section>
                        </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>


