<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize quantities with default values
$item1Quantity = isset($_POST['item1_quantity']) ? $_POST['item1_quantity'] : 0;
$item2Quantity = isset($_POST['item2_quantity']) ? $_POST['item2_quantity'] : 0;
$item3Quantity = isset($_POST['item3_quantity']) ? $_POST['item3_quantity'] : 0;

// Insert data into the purchase table only if quantities are not empty
if ($item1Quantity > 0 || $item2Quantity > 0 || $item3Quantity > 0) {
    $sql = "INSERT INTO purchase (item, quantity) VALUES
            ('Chicken Rice and Roasted Chicken', $item1Quantity),
            ('Chicken Rice and Honey Chicken', $item2Quantity),
            ('Chicken Rice and Perchik Chicken', $item3Quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "Purchase recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No items selected for purchase";
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .food-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .food-details {
            display: flex;
            align-items: center;
        }

        .food-name {
            margin-left: 10px;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 0;
            cursor: pointer;
            border-radius: 4px;
        }

        .map {
            height: 300px;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        .ok-button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .ok-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div id="container">
    <img src="ayamas.jpg" alt="Ayamas" style="max-width: 100%; border-radius: 8px;">


    <div class="food-item">
        <div class="food-details">
            <div class="food-name">
                <h3>Food Available</h3>
                <p>Chicken Rice and Roasted Chicken</p>
            </div>
        </div>

        <div class="quantity">
            <button onclick="updateQuantity('minus', 1)">-</button>
            <span id="quantity1"> 0 </span>
            <button onclick="updateQuantity('plus', 1)">+</button>
        </div>
    </div>

    <div class="food-item">
        <div class="food-details">
            <div class="food-name">
                <p>Chicken Rice and Honey Chicken</p>
            </div>
        </div>

        <div class="quantity">
            <button onclick="updateQuantity('minus', 2)">- </button>
            <span id="quantity2"> 0 </span>
            <button onclick="updateQuantity('plus', 2)"> +</button>
        </div>
    </div>

    <div class="food-item">
        <div class="food-details">
            <div class="food-name">
                <p>Chicken Rice and Perchik Chicken</p>
            </div>
        </div>

        <div class="quantity">
            <button onclick="updateQuantity('minus', 3)">-</button>
            <span id="quantity3"> 0 </span>
            <button onclick="updateQuantity('plus', 3)">+</button>
        </div>
    </div>

    <form action="shopreceipt.php" method="post">
        <input type="hidden" name="item1_quantity" id="item1_quantity" value="0">
        <input type="hidden" name="item2_quantity" id="item2_quantity" value="0">
        <input type="hidden" name="item3_quantity" id="item3_quantity" value="0">

        <button type="submit" class="ok-button">CHECKOUT</button>
    </form>
</div>

<script>
    let quantities = {1: 0, 2: 0, 3: 0};

    function updateQuantity(action, itemId) {
        const quantityElement = document.getElementById('quantity' + itemId);

        if (action === 'plus') {
            quantities[itemId]++;
        } else if (action === 'minus' && quantities[itemId] > 0) {
            quantities[itemId]--;
        }

        quantityElement.textContent = quantities[itemId];
        document.getElementById('item' + itemId + '_quantity').value = quantities[itemId];
    }
</script>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize quantities with default values
$item1Quantity = isset($_POST['item1_quantity']) ? $_POST['item1_quantity'] : 0;
$item2Quantity = isset($_POST['item2_quantity']) ? $_POST['item2_quantity'] : 0;
$item3Quantity = isset($_POST['item3_quantity']) ? $_POST['item3_quantity'] : 0;

// Insert data into the purchase table only if quantities are not empty
if ($item1Quantity > 0 || $item2Quantity > 0 || $item3Quantity > 0) {
    $sql = "INSERT INTO purchase (item, quantity) VALUES
            ('Chicken Rice and Roasted Chicken', $item1Quantity),
            ('Chicken Rice and Honey Chicken', $item2Quantity),
            ('Chicken Rice and Perchik Chicken', $item3Quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "";
}

// Close connection
$conn->close();
?>