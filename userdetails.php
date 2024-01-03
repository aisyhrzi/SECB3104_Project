<?php
session_start();

// Initialize variables
$first_name = $last_name = $email_id = $user_id = "";

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Replace these credentials with your actual database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodbank";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user details from the database using the user_id from the session
    $detailsStmt = $conn->prepare("SELECT first_name, last_name, email_id FROM details WHERE id = ?");
    $detailsStmt->bind_param("i", $user_id);
    $detailsStmt->execute();

    // Fetch the result
    $detailsResult = $detailsStmt->get_result();

    if ($detailsResult->num_rows > 0) {
        $detailsData = $detailsResult->fetch_assoc();
        $first_name = $detailsData["first_name"];
        $last_name = $detailsData["last_name"];
        $email = $detailsData["email"];
    }

    // Close the prepared statement for the details table
    $detailsStmt->close();

    // Close the database connection
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user details from the form
    $phone_number = $_POST["phone_number"];
    $donate = $_POST["donate"];

    // If the user is not logged in, get the details from the form
    if (!isset($_SESSION['id'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
    }
}
?>
    
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 30px;
            margin-right: 10px;
        }

        .logo span {
            font-size: 20px;
            font-weight: bold;
        }

        .search-bar {
            flex: 1;
            margin: 0 20px;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .navbar-content {
            display: flex;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 5px;
        }

        .bottom {
            margin-top: auto;
        }

        .nav-link.logout {
            cursor: pointer;
            color: black;
            display: flex;
            align-items: center;
        }

        .nav-link.logout:hover {
            color: #333;
        }

        .donation-container {
            display: flex;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .details-container,
        .amount-container {
            flex: 1;
            padding: 30px;
            color: black;
        }

        .donation-form {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .donation-form label {
            margin-bottom: 8px;
            font-weight: bold;
            display: block;
            color: #555;
        }

        .donation-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .donation-option {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #007BFF;
            color: white;
            text-align: center;
            line-height: 50px;
            margin: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .donation-option:hover {
            transform: scale(1.1);
        }

        #other_amount {
            width: calc(100% - 16px);
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .section-header {
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 24px;
            color: black;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .donation-container {
                flex-direction: column;
            }

            .details-container,
            .amount-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- ... rest of your HTML code ... -->

    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
            <span>FoodBank.My</span>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Search" />
        </div>

        <div class="navbar-content">
            <a href="#" class="nav-link">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>

            <i class='bx bx-sun' id="darkLight"></i>

            <a href="#" class="nav-link">
                <i class='bx bx-bell'></i>
                <span>Notifications</span>
            </a>

            <div class="nav-link logout" onclick="window.location.href='login.php'">
                <i class='bx bx-log-out'></i>
                <span>Log Out</span>
            </div>
        </div>
    </div>

    <!-- Donation Form -->
    <div class="donation-container">
        <div class="details-container">
            <form method="post" action="donationdetails.php" class="donation-form">
                <div class="section-header">Information Details</div>

                <!-- Display user details -->
                <div>
                    <label for="first_name">First Name:</label>
                    <span id="first_name"><?php echo $first_name; ?></span>
                </div>

                <div>
                    <label for="last_name">Last Name:</label>
                    <span id="last_name"><?php echo $last_name; ?></span>
                </div>

                <div>
                    <label for="email">Email Address:</label>
                    <span id="email"><?php echo $email; ?></span>
                </div>

                <!-- Add the phone number input -->
                <label for="phone_number">Phone Number:</label>
                <input type="number" id="phone_number" name="phone_number" required>

            </div>
            <div class="amount-container">
            <div class="section-header">Donation Details</div>
                <?php
                $donation_options = [10, 15, 20, 25, 30, 35];
                foreach ($donation_options as $option) {
                    echo '<div class="donation-option" onclick="selectDonation(' . $option . ')">$' . $option . '</div>';
                }
                ?>
                <p>
                    <label for="other_amount">Amount Total:</label>
                    <input type="number" id="other_amount" name="other_amount" min="1" value="<?php echo $donate > 0 ? $donate : ''; ?>" readonly>
                    <br><br>
                    <input type="submit" value="Donate Now">

                    <input type="hidden" id="selected_donation" name="donate" value="<?php echo $donate; ?>">
                </p>
            </div>
        </form>
    </div>
</div>
<script>
    function selectDonation(amount) {
        document.getElementById('selected_donation').value = amount;
        document.getElementById('other_amount').value = amount;
    }
</script>
</body>

</html>
<!-- ... rest of your form ... -->
</form>

