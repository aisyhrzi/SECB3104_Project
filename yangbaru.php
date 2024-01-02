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

<!DOCTYPE HTML>
<html lang="en">
<head>
    <!-- Include the required meta tags, CSS links, and other head elements -->
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function () {
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
    <style>
        /* Add your custom styles here */
        body {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            background-color: #f5f5f5;
            transition: all 0.5s ease;
            min-height: 100vh;
        }

        .grid-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
            width: 45%; /* Adjust the width according to your preference */
            margin-bottom: 20px;
        }

        .grid-item.donation {
            background-color: #fafafa; /* Adjust background color for donations */
        }

        .grid-item.volunteer {
            background-color: #f0faff; /* Adjust background color for volunteers */
        }

        /* Additional styles go here */
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 20px;
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- Your existing navigation and other HTML code -->

    <div class="grid-item donation">
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
         </div>.
            ?>
        </p>
    </div>

    <div class="flex-container">
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>

    <!-- Other grid items go here -->

</body>
</html>
