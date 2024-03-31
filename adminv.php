<?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "foodbank";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // Fetch data from distribution_events table
                    $resultEvents = $conn->query("
                        SELECT event_type, COUNT(*) as event_count
                        FROM distribution_events
                        GROUP BY event_type
                    ");
                    
                    // Fetch data from distribution_events_r table
                    $resultEventsR = $conn->query("
                        SELECT event_type, COUNT(*) as event_count
                        FROM distribution_events_r
                        GROUP BY event_type
                    ");
                    
                    // Fetch data from distribution_events_t table
                    $resultEventsT = $conn->query("
                        SELECT event_type, COUNT(*) as event_count
                        FROM distribution_events_t
                        GROUP BY event_type
                    ");
                    
                    $conn->close();
                    
                    // Combine data from all tables
                    $data = [
                        'events' => fetchData($resultEvents),
                        'events_r' => fetchData($resultEventsR),
                        'events_t' => fetchData($resultEventsT),
                    ];
                    
                    function fetchData($result)
                    {
                        $data = ['labels' => [], 'values' => []];
                    
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $data['labels'][] = $row["event_type"];
                                $data['values'][] = $row["event_count"];
                            }
                        }
                    
                        return $data;
                    }
                    ?>
                    
                    
                    <?php
                    $dataPoints = [
                        ["label" => "Event types : Transportation", "y" => $data['events_t']['values']],
                        ["label" => "Event types : Weekly Distribution", "y" => $data['events']['values']],
                        ["label" => "Event types : Pickup From Restaurant", "y" => $data['events_r']['values']],
                    ];
                    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Volunteer View</title>
    <script>
                    window.onload = function() {
                     
                     
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "Types Of Volunteers"
                        },
                        subtitles: [{
                            text: "Foodbank. My"
                        }],
                        data: [{
                            type: "pie",
                            yValueFormatString: "#,##\"volunteers\"",
                            indexLabel: "{label} ({y})",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();
                     
                    }
                    </script>
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
    .request-volunteer-form h3 {
    text-align: center;
    color: #333;
    transition: transform 0.3s ease-in-out; /* Add a transition for the transform property */
}

.request-volunteer-form h3:hover {
    transform: scale(1.1); /* Add a scale transformation on hover for the bubbly effect */
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
                <a href="adminInterface.php" >
                        Admin Dashboard
                    </a>
                    <a href="admind.php">
                        Donor Overview
                    </a>
                    <a href="adminv.php"class="active">
                        Volunteer Overview
                    </a>
                    <a href="admindonate.php" >
                        Donation Amount
                    </a>
                    
            </div></div>
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
   
    
                
    
        </header>
        
                
            
            <div class="app-body-main-content">
                <section class="service-section">
                    <br>
                    <h2>Volunteer Overview</h2>
                    <div class="service-section-header">
                        <div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div>
                        
                    </div>
                    
                    <body>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    </body>
                           
                    
           
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


