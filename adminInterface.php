<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Description</title>
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
    transition: transform 0.3s ease-in-out; /* Add a transition for the transform property */
}

.request-volunteer-form h3:hover {
    transform: scale(1.1); /* Add a scale transformation on hover for the bubbly effect */
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

        .user-profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .user-profile-dropdown:hover .dropdown-content {
        display: block;
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
                <a href="adminInterface.php" class="active">
                        Admin Dashboard
                    </a>
                    <a href="admind.php">
                        Donor Overview
                    </a>
                    <a href="adminv.php">
                        Volunteer Overview
                    </a>
                    <a href="admindonate.php" >
                        Donation Amount
                    </a>
                    
                    
                </div>
            </div>
            <div class="user-profile-dropdown">
    <button class="user-profile" onclick="confirmLogout()">
        <span>Hi Admin</span>
        <!-- Add a down arrow icon -->
        <span>&#9660;</span>
    </button>
    <!-- Dropdown content -->
    <div class="dropdown-content">
        <a href="#" onclick="confirmLogout()">Log Out</a>
    </div>
</div>
                
    
        </header>
        
                
            
            <div class="app-body-main-content">
                <section class="service-section">
                    <br>
                    <h2>Admin Overview</h2>
                    
                    <div class="service-section-header">
                    <div class="request-volunteer-form">
    <h3>           <img src="logo.png" height = 200px alt="Dashboard Image" class="center">
                <p class="center">Welcome to the FoodBank.MY. Explore the available features and services to make a positive impact!</p></h3>
        
      
    </form>
    <div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div>
        
</div>
                    </div>
                    
                    
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
<script>
    function confirmLogout() {
        var logoutConfirmed = confirm("Are you sure you want to log out?");
        if (logoutConfirmed) {
            logout();
        }
    }

    function logout() {
        // Redirect to the logout page (replace 'login.php' with your actual logout page)
        window.location.href = 'login.php';
    }
</script>
</html>


