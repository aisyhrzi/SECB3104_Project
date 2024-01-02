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
    $pickupOption = isset($_POST['pickup-option']) ? $_POST['pickup-option'] : '';

    $stmt = $conn->prepare("INSERT INTO donorDetails (donorName, donorEmail, donorPhone, donorAddress, foodName, foodQuantity, pickupOption) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $donorName, $donorEmail, $donorPhone, $donorAddress, $foodName, $foodQuantity, $pickupOption);

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
            <input type="text" id="donor-address" name="donor-address" required>

            <label for="food-name">Food Name:</label>
            <input type="text" id="food-name" name="food-name" required>
            
            <label for="food-quantity">Quantity :</label>
            <input type="number" id="food-quantity" name="food-quantity" required>
            
            <label for="pickup-option">Choose Pickup or Volunteer:</label>
            <select id="pickup-option" name="pickup-option">
                <option value="pickup">Pick up at the shop</option>
                <option value="volunteer">Volunteer distributions</option>
            </select>

            <button type="submit">Donate </button>
        </form>
    </div>
    <script src="Fb.js"></script>
</body>
</html>






    














