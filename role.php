<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodBank.My</title>
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <style>

        h2 {
            color: black;
            font-size: 10px;
            font-family: 'Roboto', sans-serif;
        }
        body {
            font-family: 'Roboto', sans-serif;
            text-align: justify;
            margin: 25px;
            background: #000;
        }

        body::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.7;
            width: 100%;
            height: 100%;
            background: url("https://www.zdnet.com/a/img/resize/7928be58006d42770318cb8b31ab52fe25e1345e/2022/10/27/0089a944-0148-4741-a449-9607bf810e2a/gettyimages-1125756387.jpg?auto=webp&width=1280");
            background-position: center;
        }

.navbar .logo {
  color: white;
  font-weight: 600;
  font-size: 2.1rem;
  text-decoration: none;
}
        
        .role-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns with equal width */
            gap: 10px; /* Gap between buttons */
            margin-top: 5x;
        }

        .role-button {
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border: 2px solid #000;
            border-radius: 5px;
            background-color: #37bb3d;
            color: black;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
            position: relative;
        }

        .role-button img {
            max-width: 100%;
            max-height: 100%;
            display: block;
            margin: 0 auto;
        }

        .role-button:hover {
            background-color: #19912d;
            opacity: 0.7;
            color: #fff;
        }
        
    </style>
</head>
<body>

    <div class="h2">
        <b>Select Your Role</b>
    </div>
    <div class="role-buttons">
        <a href="#" class="role-button" onclick="selectRole('donor')">
            <h3>Donor</h3>Donors play a pivotal role in reducing food waste by contributing surplus food. Their generosity helps address hunger and promotes sustainability. Each donation, big or small, contributes to creating a more equitable and waste-conscious society. <br> <br> <br> <br> <br> 
            <img src="donor.png" alt="Donor Image" style="width:250px;">
        </a>
        <a href="validatesalary.php" class="role-button" onclick="selectRole('receiver')">
            <h3>Receiver</h3>Receivers benefit directly from donated food, receiving support that alleviates food insecurity. By connecting donors with those in need, the receiver role ensures a more equitable distribution of resources, fostering community well-being and resilience.<br> <br> <br> 
            <img src="receiver.png" alt="Donor Image">
        </a>
        <a href="#" class="role-button" onclick="selectRole('volunteer')">
            <h3>Volunteer</h3>Volunteers play a crucial role in bridging the gap between donors and receivers. By dedicating their time and effort, volunteers contribute to the efficient functioning of the food distribution process, promoting a sense of solidarity and shared responsibility in the fight against food waste and hunger.
            <img src="volunteer.png" alt="Volunteer Image">
        </a>
    </div>
</body>
</html>
