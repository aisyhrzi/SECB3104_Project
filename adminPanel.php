<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panels</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('makei.jpg') center/cover no-repeat;
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

        .admin-container {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 1300px;
            padding: 20px;
            text-align: center;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.9);
        }

        h1 {
            color: #3498db;
            margin-bottom: 20px;
        }

        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        .edit-button, .delete-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .edit-button:hover, .delete-button:hover {
            background-color: #2980b9;
        }

        @media (max-width: 600px) {
            th, td {
                padding: 8px;
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

    <!-- Admin Panel Content -->
    <div class="admin-container">
        <h1>Admin Panel</h1>

        <!-- Filter input -->
        <label for="filterInput">Search:</label>
        <input type="text" id="filterInput" oninput="filterTable()" placeholder="Type to filter">

        <?php
        try {
            // Database connection
            $db = new PDO('mysql:host=localhost;dbname=foodbank', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Define the column labels
            $columnLabels = array('ID', 'Donor Name', 'Donor Email', 'Donor Phone', 'Donor Address', 'Food Name', 'Food Quantity', 'Pickup Option', 'Food Expiry Date');

            // Fetch all records from the database
            $query = "SELECT * FROM donorDetails";
            $stmt = $db->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($records) {
                echo "<div class='table-container'>";
                echo "<table>";

                // Generate table headers dynamically
                echo "<tr>";
                foreach ($columnLabels as $label) {
                    echo "<th>" . htmlspecialchars($label) . "</th>";
                }
                echo "<th>Action</th></tr>";

                // Generate table rows dynamically
                foreach ($records as $record) {
                    echo "<tr id='row-" . $record['id'] . "'>";
                    foreach ($record as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "<td>";
                    echo "<form method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='delete_id' value='" . $record['id'] . "'>";
                    echo "<button class='delete-button' type='submit'>Delete</button>";
                    echo "</form>";
                    echo "<button class='edit-button' onclick='editRecord(" . $record['id'] . ")'>Edit</button>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>No records found.</p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>

    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filterInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (var j = 0; j < td.length - 1; j++) { // Exclude the last cell with buttons
                    if (td[j]) {
                        txtValue = td[j].innerText || td[j].textContent;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break; // Break if any of the columns matches the filter
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }

        function editRecord(id) {
            window.location.href = 'editRecord.php?id=' + id;
        }
    </script>
</body>

</html>


















