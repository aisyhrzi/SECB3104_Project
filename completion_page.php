<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url('makan.png'); /* Specify your background image URL */
            background-size: cover; /* Cover the entire viewport */
            background-repeat: no-repeat; /* No repeating of the image */
            color: #fff; /* Text color */
        }

        h2, p {
            text-align: center;
            max-width: 400px; /* Adjust the maximum width as needed */
            margin: 20px 0;
            background-color: white; /* White background for text box */
            padding: 20px; /* Padding for text box */
            border-radius: 8px; /* Rounded corners for text box */
        }

        h2 {
            color: #007bff; /* Heading color */
        }

        p {
            color: #4caf50; /* Paragraph color */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Button background color */
            color: #fff; /* Button text color */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Your order is completed</h2>
    <p>
        Thank you for using our service. Your order has been successfully completed.
    </p>
    <button onclick="window.location.href='econsave_details.php'">Return</button>
</body>
</html>





