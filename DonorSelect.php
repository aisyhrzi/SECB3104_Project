<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Selection</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-image: url('gambar.png'); /* Add the path to your body background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            
        
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

        .container {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            width: 350px;
            padding: 20px;
            margin: auto; /* Center the container horizontally */
            
        }

        .role-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
            background-color: #007BFF; /* Change button color */
            color: #fff; /* Change text color */
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

    <!-- Role Selection Form Container -->
    <div class="container">
        <div class="role-form">
            <h2><p>Please select your role:</p></h2>
            <button onclick="window.location.href='donations.php'">Donor</button>
            <button onclick="window.location.href='adminPanel.php'">Admin</button>
            <button onclick="window.location.href='receiver.php'">Receiver</button>
            <button onclick="window.location.href='volunteer.php'">Volunteer</button>
        </div>
    </div>

    <!-- ... rest of your HTML code ... -->

</body>

</html>






