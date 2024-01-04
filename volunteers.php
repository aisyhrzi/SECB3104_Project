<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Distribution</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('pic.jpg'); /* Specify your image file */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* No repeating of the image */
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            color: #fff;
            align-items: center;
            justify-content: center;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: fixed;
            top: 0;
        }

        .logo {
            display: flex;
            align-items: center;
            color: black;
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

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 80%; /* Adjust the width as needed */
            overflow-x: auto; /* Add horizontal scroll if needed */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            color: #333;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        .name-email-column {
            display: none;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
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

    <!-- Placeholder content -->
    <div class="content">
        <?php
        // Fetch data of users who selected volunteer distribution option
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Foodbank";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT donorName, donorEmail, donorAddress FROM donorDetails WHERE pickupOption = 'volunteer'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th class='name-email-column'>Name</th><th class='name-email-column'>Email</th><th>Address</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                $donorName = isset($row['donorName']) ? htmlspecialchars($row['donorName']) : '';
                $donorEmail = isset($row['donorEmail']) ? htmlspecialchars($row['donorEmail']) : '';
                $donorAddress = htmlspecialchars($row['donorAddress']);

                echo "<td class='name-email-column'>$donorName</td>";
                echo "<td class='name-email-column'>$donorEmail</td>";
                echo "<td>$donorAddress</td>";
                echo "<td><button onclick='acceptAction(\"$donorName\")'>Accept</button></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No volunteer distribution information available.</p>";
        }

        $conn->close();
        ?>
    </div>
    <!-- End of placeholder content -->

    <script>
        function acceptAction(donorName) {
            window.location.href = "volunteer_details.php?donorName=" + encodeURIComponent(donorName);
        }
    </script>
</body>

</html>
















