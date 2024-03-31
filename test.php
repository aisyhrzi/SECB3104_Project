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
<html>
<head>
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
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>            
