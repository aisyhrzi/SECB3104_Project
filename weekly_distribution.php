<!DOCTYPE html>
<html>
<head>
    <title>Weekly Distribution</title>
    <link rel="stylesheet" type="text/css" href="style01.css">
    <link rel="stylesheet" type="text/css" href="style02.css">
    <script src="weekly_javaScript.js" defer></script>
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

        #map {
            height: 300px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="topnav">
    <a href="dashboard_v.php" class="btn">Home</a>
    <a id="homeLink" href="#home" class="active" onclick="handleClick(this)">Weekly Distribution</a>
    <a id="displayButton" onclick="displayInfo(); handleClick(this)">📅 Current Schedule</a>
</div>

<div id="infoDisplay"></div>

    <div class="header">
        <h2>Weekly Distribution</h2>
    </div>

    <div class="container">
        <form action="process_weekly_distribution.php" method="post">
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
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
                <button type="button" onclick="showLocationOnMap()">Show on Map</button>
                <div id="map"></div>
            </div>
            <input type="submit" class="btn" value="Schedule Distribution">
        </form>
    </div>

    <div class="footer">
        <p></p>
    </div>

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
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 1.5645, lng: 103.6373},
            zoom: 14.7
        });

            var distributionLocationInput = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(distributionLocationInput);

            // Set the bounds to the current map's viewport.
            autocomplete.bindTo('bounds', map);
        }

        function showLocationOnMap() {
            var locationInput = document.getElementById('location');
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