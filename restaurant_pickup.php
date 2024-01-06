<!DOCTYPE html>
<html>
<head>
    <title>Picking Up Food from Restaurants</title>
    <link rel="stylesheet" type="text/css" href="style01.css">
    <link rel="stylesheet" type="text/css" href="style02.css">
    <script src="restaurant_javaScript.js" defer></script>
    <style>
        body {
            background-image: url('image.jpg');
            background-size: cover; /* Adjust the sizing of the background image */
            background-position: center center; /* Center the background image */
            background-repeat: no-repeat; /* Ensure the background image doesn't repeat */
        }

        .form-group input[type="name"],
        .form-group input[type="text"] {
            width: 100%; /* Set the width to 100% to make it full width of the container */
            padding: 8px; /* Optional: Add padding for better aesthetics */
            box-sizing: border-box; /* Ensure padding and border are included in the total width */
        }

        #restaurant_map {
            height: 300px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank"; // Update to your existing database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the username from the details table
$username = ''; // Set a default value

$detailsQuery = "SELECT username FROM details LIMIT 1"; // Assuming you want only one username
$detailsResult = $conn->query($detailsQuery);

if ($detailsResult === FALSE) {
    die("Error in details query: " . $conn->error);
}

if ($detailsResult->num_rows > 0) {
    $detailsRow = $detailsResult->fetch_assoc();
    $username = $detailsRow['username'];
}
?>

<div class="topnav">
    <a href="dashboard_v.php" class="btn">Home</a>
    <a id="homeLink" href="#home" class="active" onclick="handleClick(this)">Restaurant Pick-up</a>
    <a id="displayButtonR" onclick="displayInfoR(); handleClick(this)">🍽️ Current Schedule</a>
</div>

<div id="infoDisplay"></div>

    <div class="header">
        <h2>Picking Up Food from Restaurants</h2>
    </div>

    <div class="container">
        <form action="process_restaurant_pickup.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="name">Volunteer Name (Username):</label>
                <input type="text" id="name" name="name" value="<?php echo $username; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="restaurant_location">Restaurant Location:</label>
                <input type="text" id="restaurant_location" name="restaurant_location" required>
                <button type="button" onclick="showLocationOnMap()">Show on Map</button>
                <div id="restaurant_map"></div>
             </div>
            </div>
            <input type="submit" class="btn" value="Schedule Pick-Up">
        </form>
    </div>

    <div class="footer">
        <p></p>
    </div>

    <script>
    // Function to set the restaurant_location input value
        function setRestaurantLocation(address) {
            document.getElementById('restaurant_location').value = address;
        }
    </script>

    <script>
    function handleClick(clickedElement) {
        // Check if the "Home" link is clicked
        if (clickedElement.id === 'homeLink') {
            // Reset the page or clear the displayed information
            document.getElementById('infoDisplay').innerHTML = '';
            // You can add additional reset actions if needed
        }

        // Remove the 'active' class from all links
        var links = document.getElementsByClassName('topnav')[0].getElementsByTagName('a');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.remove('active');
        }

        // Add the 'active' class to the clicked link
        clickedElement.classList.add('active');
    }
    </script>

    <script>
    function initRestaurantMap() {
        var restaurantMap = new google.maps.Map(document.getElementById('restaurant_map'), {
            center: {lat: 1.5645, lng: 103.6373},
            zoom: 14.7
        });

        var restaurantLocationInput = document.getElementById('restaurant_location');
        var restaurantAutocomplete = new google.maps.places.Autocomplete(restaurantLocationInput);

        // Set the bounds to the current map's viewport.
        restaurantAutocomplete.bindTo('bounds', restaurantMap);

        // Optionally, you can add an event listener to handle place selection.
        restaurantAutocomplete.addListener('place_changed', function() {
            var place = restaurantAutocomplete.getPlace();
            // Do something with the selected place, if needed.
        });

        // Save the map instance in a variable for later use.
        window.restaurantMap = restaurantMap;
    }

    // New function to show the entered location on the map.
    function showLocationOnMap() {
        var locationInput = document.getElementById('restaurant_location');
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'address': locationInput.value }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var location = results[0].geometry.location;
                window.restaurantMap.setCenter(location);
                var marker = new google.maps.Marker({
                    map: window.restaurantMap,
                    position: location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    // Get the address from the URL parameter
    var urlParams = new URLSearchParams(window.location.search);
    var donorAddress = urlParams.get('donorAddress');

    // Set the restaurant_location input value
    setRestaurantLocation(donorAddress);

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlZ4VAT_LmNI0kKqUpPusyXa3BqYclROg&libraries=places&callback=initRestaurantMap"></script>
</script>

</body>
</html>