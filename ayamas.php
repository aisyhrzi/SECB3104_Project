<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="econsaveshop.css">
    <title>Ayamas</title>
</head>
    <style>
        <!-- ... (your styles) ... -->
        .center-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .food-availability-form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .food-availability-form label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .food-availability-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            appearance: none;
            background-color: white;
            background-position: right center;
            background-repeat: no-repeat;
            cursor: pointer;
        }

        .food-availability-form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .food-availability-form button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .food-availability-form button:hover {
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
                <a href="dashboard.php">
                        Dashboard
                    </a>
                    <a href="shop.php" class="active">
                        Shop
                    </a>
                    <a href="volunteer.php">
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
                <h2>Ayamas</h2>
                <!-- Food Availability Form -->
                <div class="food-availability-form">
                    <h3>Check Food Availability</h3>
                    <form action="insert_econsave.php" method="POST">
                        <label for="food_item">Select Food Item:</label>
                        <select id="food_item" name="food_item" onchange="updateQuantity()">
                            <?php
                                // Replace these database connection details with your own
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "Foodbank";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // SQL query to retrieve food items and expiry date from the database
$sql = "SELECT ayamasFood, ayamasExpiry FROM ayamas";
$result = $conn->query($sql);

// Populate the dropdown with retrieved data
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['ayamasFood'] . '" data-expiry-date="' . $row['ayamasExpiry'] . '">' . $row['ayamasFood'] . '</option>';
}



                                // Close the database connection
                                $conn->close();
                            ?>
                        </select>
                        <label for="quantity">Quantity Available: <span id="quantity">0</span></label>
                        <label for="best_before">Best Before: <span id="best_before">N/A</span></label>
                        <label for="quantity_select">Select Quantity:</label>
                        <select id="quantity_select" name="quantity">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <!-- Add more options as needed -->
                        </select>
                        <button type="submit" name="submit">OK</button>
                    </form>
                </div>
                <!-- End Food Availability Form -->
            </section>
        </div>
            
            <!-- ... (your existing content) ... -->
            
            <footer class="footer">
                <h1>FoodBank.MY<small>©</small></h1>
                <div>
                    FoodBank.MY ©<br />
                    All Rights Reserved 2023
                </div>
            </footer>
        </div>
    </div>

    <script>
    function redirectToReceipt() {
        // Add your logic to submit the form data and handle it if needed

        // Redirect to receipt.php
        window.location.href = 'shopreceipt.php';

        // Prevent the default form submission
        return false;
    }

    function updateQuantity() {
    var foodName = document.getElementById("food_item").value;

    // Make an AJAX request to get_quantity.php
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "quantityayamas.php?food_item=" + encodeURIComponent(foodName), true);

    // Define the function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Update the quantity based on the response
            document.getElementById("quantity").innerText = xhr.responseText;

            // Update the "Best Before" based on the selected food item
            var bestBeforeSpan = document.getElementById("best_before");
            bestBeforeSpan.innerText = getBestBeforeDate(foodName);
        }
    };

    // Send the request
    xhr.send();
}

// Function to get the "Best Before" date from the selected food item
function getBestBeforeDate(foodName) {
    var select = document.getElementById("food_item");
    var selectedOption = select.options[select.selectedIndex];
    return selectedOption.getAttribute("data-expiry-date") || "N/A";
}




    document.addEventListener("DOMContentLoaded", function () {
        // Add a submit event listener to the form
        document.getElementById("food_availability_form").addEventListener("submit", function (event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Call the updateQuantity function
            updateQuantity();

            // Call the redirectToReceipt function after updating quantity
            redirectToReceipt();
        });
    });
</script>



</body>
</html>
