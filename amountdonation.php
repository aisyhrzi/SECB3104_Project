
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="amountdonation.css">
    <title>Donation</title>
</head>
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

    
        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .donation-option {
            display: inline-block;
            width: 50px;
            height: 50px;
            border-radius: 20%;
            background-color: #4caf50; /* Orange */
            color: White;
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
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #FF7F50;
            border-radius: 20%;
            color: white;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #CC6640;
        }
    
</style>
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
                    <a href="shop.php">
                        Shop
                    </a>
                    <a href="volunteer.php">
                        Volunteer
                    </a>
                    <a href="donation.php" class="active">
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
                    <h2>Donation</h2>
                    <div class="service-section-header">
                    <div class="request-volunteer-form">

    <h3>Donation: Step 2</h3>
    
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php
    $donation_options = [10, 15, 20, 25, 30, 35];
    foreach ($donation_options as $option) {
        echo '<div class="donation-option" style="background-color: #FF7F50;" onclick="selectDonation(' . $option . ')">$' . $option . '</div>';
    }
    ?>
    <label for="other_amount">Other amount:</label><br>
    <input type="number" id="other_amount" name="other_amount" min="1" value="<?php echo $other_amount; ?>">
    <br><br>
    <input type="submit" value="Donate Now">
    <input type="hidden" id="selected_donation" name="donation_amount" value="<?php echo $donation_amount; ?>">
</form>
</div>
<div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div>
        
</div>
                    </div>
                    
                    
                    </section>
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
        function selectDonation(amount) {
            document.getElementById('selected_donation').value = amount;
        }
    </script>

</body>
</html>


