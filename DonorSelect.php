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
    min-height: 100vh;
    background-image: url('gambar.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    color: #333;
    backdrop-filter: blur(2px); /* Add a blur effect to the background */
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
            width: 80%;
            max-width: 600px;
            padding: 30px;
            margin: auto;
            margin-top: 70px;
            text-align: center;
        }

        .role-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .role-form button {
    padding: 30px 40px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 20px;
    background-color: #007BFF;
    color: #fff;
    width: 100%;
    transition: transform 0.3s ease; /* Added transition property */
}

.role-form button:hover {
    background-color: #0056b3;
    transform: scale(1.1); /* Zoom in on hover */
}

        h2 {
            margin-bottom: 20px;
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
           
            <button onclick="window.location.href='donations.php'">Donate Food</button>
            <button onclick="window.location.href='valids.php'">View Details</button>
            <button onclick="window.location.href='receivers.php'">Pick Up Food</button>
            <button onclick="window.location.href='volunteers.php'">Help Distribute</button>
            <button onclick="window.location.href='valids2.php'">View Status</button>
        </div>
    </div>

    <!-- ... rest of your HTML code ... -->

</body>

</html>
