<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details Graph</title>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve count for 'pickup' option
$sqlPickupCount = "SELECT COUNT(*) as pickupCount FROM donorDetails WHERE pickupOption = 'pickup'";
$resultPickupCount = mysqli_query($conn, $sqlPickupCount);
$rowPickupCount = mysqli_fetch_assoc($resultPickupCount);
$pickupCount = $rowPickupCount['pickupCount'];

// Retrieve count for 'volunteer' option
$sqlVolunteerCount = "SELECT COUNT(*) as volunteerCount FROM donorDetails WHERE pickupOption = 'volunteer'";
$resultVolunteerCount = mysqli_query($conn, $sqlVolunteerCount);
$rowVolunteerCount = mysqli_fetch_assoc($resultVolunteerCount);
$volunteerCount = $rowVolunteerCount['volunteerCount'];

mysqli_close($conn);
?>



<!-- Bar graph -->
<canvas id="donorDetailsChart" width="20" height="5"></canvas>

<script>
// Use Chart.js to create a bar graph
var ctx = document.getElementById('donorDetailsChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Pickup at their shop', 'Volunteer Distribution'],
        datasets: [{
            label: 'Donor Details',
            data: [<?php echo $pickupCount; ?>, <?php echo $volunteerCount; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Red color for pickup
                'rgba(54, 162, 235, 0.2)'  // Blue color for volunteer
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
