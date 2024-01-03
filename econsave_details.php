<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Foodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["action"]) && isset($_GET["id"])) {
        $action = $_GET["action"];
        $id = $_GET["id"];

        if ($action === "complete") {
            $updateSql = "UPDATE econsave_details SET status = 'completed' WHERE id = $id";
            if ($conn->query($updateSql) === TRUE) {
                header("Location: completion_page.php?id=$id");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif ($action === "incomplete") {
            $updateSql = "UPDATE econsave_details SET status = 'pending' WHERE id = $id";
            if ($conn->query($updateSql) === TRUE) {
                header("Location: incomplete_page.php?id=$id");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
}

$sql = "SELECT id, username_receiver, email, foodName, foodQuantity, status FROM econsave_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Econsave Details</title>";
    echo "<style>";
    echo "body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('pic.jpg');
            background-size: cover;
            background-repeat: no-repeat;
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

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            color: #333;
            border: 1px solid #007BFF;
            background-color: white;
        }

        tr {
            border-bottom: 1px solid #007BFF;
        }

        th, td {
            border: 1px solid #007BFF;
            padding: 10px;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        button {
            padding: 5px 10px;
            cursor: pointer;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        .complete-btn {
            background-color: #4CAF50;
        }

        .incomplete-btn {
            background-color: #f44336;
        }

        .view-btn {
            background-color: #007BFF;
        }";
    echo "</style>";
    echo "</head>";
    echo "<body>";

    // Your HTML content here

    echo "<div class='navbar'>
            <div class='logo'>
                <img src='logo.png' alt='Logo'>
                <span>FoodBank.My</span>
            </div>

            <div class='search-bar'>
                <input type='text' placeholder='Search' />
            </div>

            <div class='navbar-content'>
                <a href='#' class='nav-link'>
                    <i class='bi bi-grid'></i>
                    <span>Dashboard</span>
                </a>

                <i class='bx bx-sun' id='darkLight'></i>

                <a href='#' class='nav-link'>
                    <i class='bx bx-bell'></i>
                    <span>Notifications</span>
                </a>

                <div class='nav-link logout' onclick='window.location.href='login.php''>
                    <i class='bx bx-log-out'></i>
                    <span>Log Out</span>
                </div>
            </div>
        </div>";

    // Table Content
    echo "<table>";
    echo "<tr><th>ID</th><th>Username Receiver</th><th>Email</th><th>Food Name</th><th>Food Quantity</th><th>Status</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['username_receiver']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['foodName']}</td>";
        echo "<td>{$row['foodQuantity']}</td>";
        echo "<td>{$row['status']}</td>";
        echo "<td>
                <button class='complete-btn' onclick='completeRequest({$row["id"]})'>Complete</button>
                <button class='incomplete-btn' onclick='incompleteRequest({$row["id"]})'>Incomplete</button>
              </td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<script>
            function completeRequest(id) {
                window.location.href = 'econsave_details.php?action=complete&id=' + id;
            }

            function incompleteRequest(id) {
                window.location.href = 'econsave_details.php?action=incomplete&id=' + id;
            }
        </script>";

    echo "</body>";
    echo "</html>";
} else {
    echo "0 results";
}

$conn->close();
?>











