<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Foodbank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donorName = isset($_POST['donor-name']) ? $_POST['donor-name'] : '';
    $donorEmail = isset($_POST['donor-email']) ? $_POST['donor-email'] : '';
    $donorPhone = isset($_POST['donor-phone']) ? $_POST['donor-phone'] : '';
    $donorAddress = isset($_POST['donor-address']) ? $_POST['donor-address'] : '';
    $foodName = isset($_POST['food-name']) ? $_POST['food-name'] : '';
    $foodQuantity = isset($_POST['food-quantity']) ? $_POST['food-quantity'] : '';

    // Validate and format the date before saving to the database
    $foodExpiryDate = isset($_POST['food-expiry-date']) ? $_POST['food-expiry-date'] : null;
    if ($foodExpiryDate) {
        $dateTime = new DateTime($foodExpiryDate);
        $formattedDate = $dateTime->format('Y-m-d');
    } else {
        $formattedDate = null;
    }

    $pickupOption = isset($_POST['pickup-option']) ? $_POST['pickup-option'] : '';

    $stmt = $conn->prepare("INSERT INTO donorDetails (donorName, donorEmail, donorPhone, donorAddress, foodName, foodQuantity, foodExpiryDate, pickupOption) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $donorName, $donorEmail, $donorPhone, $donorAddress, $foodName, $foodQuantity, $formattedDate, $pickupOption);

    if ($stmt->execute()) {
        header("Location: details.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fb.css">
    <title>Food Bank Donor Form</title>
</head>
<body>
    <div class="container">
        <h1>Donate Food</h1>
        <form id="donor-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="donor-name">Name:</label>
            <input type="text" id="donor-name" name="donor-name" required>
            
            <label for="donor-email">Email:</label>
            <input type="email" id="donor-email" name="donor-email" required>
            
            <label for="donor-phone">Phone Number:</label>
            <input type="tel" id="donor-phone" name="donor-phone" required>
            
            <label for="donor-address">Address:</label>
            <input type="text" id="address" name="donor-address" required>

            <label for="food-name">Food Name:</label>
            <input type="text" id="food-name" name="food-name" required>
            
            <label for="food-quantity">Quantity:</label>
            <input type="number" id="food-quantity" name="food-quantity" required>
            
            <label for="food-expiry-date">Food Expiry Date:</label>
            <input type="date" id="food-expiry-date" name="food-expiry-date" required>
            
            <label for="pickup-option">Choose Pickup or Volunteer:</label>
            <select id="pickup-option" name="pickup-option">
                <option value="pickup">Pick up at the shop</option>
                <option value="volunteer">Volunteer distributions</option>
            </select>

            <button type="submit">Donate </button>
        </form>
    </div>
    <div id="map"></div>
    <script src="Fb.js"></script>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 1.5645, lng: 103.6373 },
                zoom: 14.7
            });

            var distributionLocationInput = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(distributionLocationInput);

            // Set the bounds to the current map's viewport.
            autocomplete.bindTo('bounds', map);
        }

        function showLocationOnMap() {
            var locationInput = document.getElementById('address');
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ 'address': locationInput.value }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var location = results[0].geometry.location;
                    map.setCenter(location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlZ4VAT_LmNI0kKqUpPusyXa3BqYclROg&libraries=places&callback=initMap"></script>

</body>
</html>

   









    














