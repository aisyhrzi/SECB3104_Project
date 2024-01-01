<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css" />
    <style>
html, body {
    height: 100%;
    margin: 0;
}

body {
    background-color: #f5f5f5;
    transition: all 0.5s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh; /* Set minimum height to 100% of the viewport height */
}

.grid-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin: 50;
    padding: 20px;
    width: 100%;
    max-width: 1200px;
    height: 100%; /* Set height to 100% of the viewport height */
    overflow: hidden; /* Hide overflow to prevent scrolling */
}

.navbar {
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

        .navbar img {
            height: 30px;
        }

        .search_bar input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .navbar_content {
            display: flex;
            align-items: center;
        }

      

        .grid-item {
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
            width: 100%;
        }

        .grid-item:hover {
            transform: scale(1.05);
        }

        .bottom {
            margin-top: auto;
        }

        .nav_link {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
        }

        .navlink_icon {
            margin-right: 5px;
        }

        .logout {
            cursor: pointer;
            color: black;
            display: flex;
            align-items: center;
        }

        .logout:hover {
            color: #333;
        }
      
        .grid-item p {
    font-size: 24px; /* Adjust the font size according to your preference */
 /* Optionally, make the text bold */
    color: #333; /* Set the text color */
    margin-top: 50px; /* Add some spacing from the heading */
}

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="logo.png" alt="">FoodBank.My
        </div>

        <div class="search_bar">
            <input type="text" placeholder="Search" />
        </div>

        <div class="navbar_content">
            <a href="#" class="nav_link">
                <span class="navlink_icon">
                    <i class="bi bi-grid"></i>
                </span>
                <span class="navlink">Dashboard</span>
            </a>

            <i class='bx bx-sun' id="darkLight"></i>
            
            <a href="#" class="nav_link">
                <span class="navlink_icon">
                    <i class='bx bx-bell'></i>
                </span>
                <span class="navlink">Notifications</span>
            </a>

            <div class="logout" onclick="window.location.href='login.php'">
                <span class="navlink_icon">
                    <i class='bx bx-log-out'></i>
                </span>
                <span>Log Out</span>
            </div>
        </div>
    </nav>

    <div class="grid-container">
        <div class="grid-item">
            <h3>Donations Overview</h3>
            <p>
                <?php 
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "foodbank";

                $conn = new mysqli($servername, $username, $password, $dbname); 

                if ($conn->connect_error) { 
                    die("Connection failed: " . $conn->connect_error); 
                } 

                $result = $conn->query(" 
                    SELECT SUM(donate) as total_donation 
                    FROM UserDetails 
                "); 

                if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) { 
                        echo "RM" . number_format($row["total_donation"], 2); 
                    } 
                } else { 
                    echo "No donations found"; 
                } 

                $conn->close(); 
                ?>
            </p>
        </div>

        <div class="grid-item">
            <h3>Volunteers</h3>
            <p>Your content here</p>
        </div>

        <div class="grid-item">
            <h3>Donor Details</h3>
            <p>Your content here</p>
        </div>

        <div class="grid-item">
            <h3>Food Receiver</h3>
            <p>Your content here</p>
        </div>
    </div>
</body>
</html>
