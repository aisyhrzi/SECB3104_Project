<!DOCTYPE html>
<html>
<head>
    <title>Picking Up Food from Restaurants</title>
    <link rel="stylesheet" type="text/css" href="style01.css">
    <link rel="stylesheet" type="text/css" href="style02.css">
    <style>
        #restaurant_map {
            height: 300px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="topnav">
  <a href="#home">Home</a>
  <a href="#WD">Weekly Distribution</a>
  <a class="active" href="#PR">Picking Up Food from Restaurants</a>
  <a href="#T">Transportation</a>
</div>

    <div class="header">
        <h2>Picking Up Food from Restaurants</h2>
    </div>

    <div class="container">
        <form action="process_restaurant_pickup.php" method="post">
            <div class="form-group">
                <label for="name">Volunteer Name:</label>
                <input type="name" name="name" required>
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
            <input type="submit" class="btn" value="Schedule Pick-Up">
        </form>
        <a href="dashboard_v.php" class="btn">Back</a>
    </div>

    <div class="footer">
        <p>&copy; 2023 Food Saver App. All rights reserved.</p>
    </div>

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
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlZ4VAT_LmNI0kKqUpPusyXa3BqYclROg&libraries=places&callback=initRestaurantMap"></script>
</script>

</body>
</html>