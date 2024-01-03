
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Volunteer</title>
</head>
<!-- Add this inside the head tag to include some basic styles -->
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
                <a href="dashboard.php">
                        Dashboard
                    </a>
                    <a href="shop.php">
                        Shop
                    </a>
                    <a href="volunteer.php" class="active">
                        Volunteer
                    </a>
                    <a href="donation.php">
                        Donation
                    </a>
                    <a href="notification.php">
                        Notification
                    </a>
                    
                </div>
            </div>
            <div class="app-header-actions">
                <button class="user-profile">
                    <span>Hi Aisyah</span>
                    <span>
                        </span>
                </button>
                
    
        </header>
        
                
            
        <div class="app-body-main-content">
                <section class="service-section">
                    <br>
                    <h2>Volunteer</h2>
                    <div class="service-section-header">
                    <div class="request-volunteer-form">
    <h3>Volunteer Request</h3>
    <form action="process_volunteer_request.php" method="post">
        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>

        <br>

        
                <label for="time">Time:</label>
                <select id="time" name="time" required>
                    <option value="Time Range">Select Time Range</option>
                    <option value="08:00">8:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="17:00">5:00 PM</option>
                </select>
           
            
                <label for="location">Shop Location:</label>
                <input type="text" id="location" name="location" required>

                <div id="map"></div>
                
            
        
        <button type="submit">Submit Request</button>
    </form>
                        <div class="search-field">
                            <i class="ph-magnifying-glass"></i>
                        </div>
        
</div>
                    </div>
                    
                    
                        </div>
                <footer class="footer">
                    <h3>FoodBank.MY<small>©</small></h3>
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


