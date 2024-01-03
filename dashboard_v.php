<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Saver App</title>
    <link rel="stylesheet" type="text/css" href="style01.css">
    <link rel="stylesheet" type="text/css" href="style02.css">
    <script src="weekly_javaScript.js" defer></script>
    <script src="restaurant_javaScript.js" defer></script>
    <script src="transportation_javaScript.js" defer></script>
    <script src="request_javaScript.js" defer></script>
    <script src="history_javaScript.js" defer></script>

    <style>
        body {
            background-image: url('image.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh; /* Set a fixed height for the body */
            margin: 0;
        }

        /* Specific styles for each column */
        .column1 {
            background-image: url('image01.png');
            background-color: #F0FFFF;
            background-size: cover; /* Adjust the sizing of the background image */
            background-position: center center; /* Center the background image */
            background-repeat: no-repeat; /* Ensure the background image doesn't repeat */
            font-weight: bold; /* Make the text bold */
        }

        .column2 {
            background-image: url('image02.png');
            background-color: #FFFFFF;
            background-size: cover; /* Adjust the sizing of the background image */
            background-position: center center; /* Center the background image */
            background-repeat: no-repeat; /* Ensure the background image doesn't repeat */
            font-weight: bold; /* Make the text bold */
        }

        .column3 {
            background-image: url('image03.png');
            background-color: #F0FFFF;
            background-size: cover; /* Adjust the sizing of the background image */
            background-position: center center; /* Center the background image */
            background-repeat: no-repeat; /* Ensure the background image doesn't repeat */
            font-weight: bold; /* Make the text bold */
        }

    </style>

</head>
<body>
    
<div class="topnav">
    <a id="homeLink" href="#home" class="active" onclick="handleClick(this)">🏠 Home</a>
    <a id="displayButton" onclick="displayInfo(); handleClick(this)">📅 Weekly Distribution Schedule</a>
    <a id="displayButtonR" onclick="displayInfoR(); handleClick(this)">🍽️ Restaurant Pick-up Schedule</a>
    <a id="displayButtonT" onclick="displayInfoT(); handleClick(this)">🚚 Transportation Schedule</a>
    <a id="displayButtonH" onclick="displayInfoH(); handleClick(this)">🕰️ History</a> <!-- Update ID here -->
    <a id="displayButtonRec" onclick="displayInfoRec(); handleClick(this)">📦 Receiver Notification</a>
</div>

<div id="infoDisplay"></div>

    <!-- Page content -->
    <div class="header">
        <h2>HI THERE, GOOD SAMARITAN😊</h2>
        <hr>
        <h3>What Would It Be Today?</p>
        <p>Select One Below</p>
    </div>
 
    <div class="column1" style="background-color:#F0FFFF;">
        <section style="text-align: center; padding: 20px;">
            <h2 size="5"><a href="weekly_distribution.php" class="link">Weekly Distribution</a></h2>
            <p size="5"> Weekly Distribution allows users to schedule and participate in food distribution events. 
                Users can select the date, time, and location of the distribution event, and the app will handle the rest.</p>
        </section>
    </div>

    <div class="column2" style="background-color:#FFFFFF;">
        <section style="text-align: center; padding: 20px;">
            <h2><a href="restaurant_pickup.php" class="link">Picking Up Food from Restaurants</a></h2>
            <p>This feature allows users to schedule and participate in picking up surplus food from restaurants. 
                Users can select the date, time, and restaurant location for the pick-up, and the app will facilitate the process.</p>
        </section>
    </div>

    <div class="column3" style="background-color:#F0FFFF;">
        <section style="text-align: center; padding: 20px;">
            <h2><a href="transportation.php" class="link">Transportation</a></h2>
            <p>This feature enables users to manage the transportation logistics for the distribution of food. 
                Users can schedule transportation for food pick-ups and deliveries, input vehicle and route details, and the app will assist in ensuring smooth transportation of the food to the designated distribution points.</p>
        </section>
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
</body>