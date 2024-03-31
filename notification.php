
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <style>
        .advertisement {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .advertisement h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .advertisement p {
            color: #777;
            margin-bottom: 15px;
        }

        .ad-link {
            display: inline-block;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .ad-link:hover {
            background-color: #45a049;
        }
    </style>
    <title>Ads Notification</title>
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
                <a href="dashboard.php" >
                        Dashboard
                    </a>
                    <a href="shop.php">
                        Shop
                    </a>
                    <a href="explore.php">
                        Volunteer
                    </a>
                    <a href="donation.php">
                        Donation
                    </a>
                    <a href="notification.php" class="active">
                        Notification
                    </a>
                    
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Hi</span>
                    <span>
                        </span>
                </button>
                
    
        </header>
        
                
            
            <div class="app-body-main-content">
                <section class="service-section">
                    <br>
                    <h2>Notification</h2>
                    <div class="service-section-header">
                        <div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div></div>
                        
                        <div class="advertisement">
                    <h3>Exclusive Offer!</h3>
                    <p>Get 20% off on selected items. Limited time only!</p>
                    <a href="ad1_page.php" class="ad-link">Learn More</a>
                </div>

                <!-- Ad 2 -->
                <div class="advertisement">
                    <h3>New Arrivals!</h3>
                    <p>Check out our latest products. Fresh and exciting!</p>
                    <a href="ad2_page.php" class="ad-link">Learn More</a>
                </div>

                <!-- Ad 3 -->
                <div class="advertisement">
                    <h3>Flash Sale!</h3>
                    <p>Hurry! Grab your favorites at discounted prices.</p>
                    <a href="ad3_page.php" class="ad-link">Learn More</a>
                </div>
                
                <!-- ... (rest of your existing content) ... -->
                
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


