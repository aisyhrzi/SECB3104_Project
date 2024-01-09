<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('makei.jpg'); /* Add your background image path */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            color: #333; /* Changed text color to a darker shade */
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(1px); /* Added backdrop-filter for blur effect */
        }

        .login-container {
    background-color: rgba(255, 255, 255, 0.95); /* Slightly increased background opacity */
    padding: 40px; /* Increased padding */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Softened box shadow */
    text-align: center;
    max-width: 400px; /* Set a max-width for better readability */
    margin: auto; /* Center the container */
}

.login-container h2 {
    margin-bottom: 20px;
    color: #007BFF; /* Set heading color */
    font-size: 24px; /* Increased font size */
}
        label {
            display: block;
            margin-bottom: 10px; /* Increased margin */
            text-align: left;
            color: #333; /* Set label color to a darker shade */
        }

        input {
            width: calc(100% - 16px); /* Adjusted input width */
            padding: 10px;
            margin-bottom: 20px; /* Increased margin */
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 12px;
            cursor: pointer;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
        }

        button:hover {
            background-color: #0056b3; /* Darker color on hover */
        }

        p {
            margin-top: 20px; /* Added margin for error message */
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="valids2.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if the entered username and password match the predefined values
                if ($_POST["username"] == "admin" && $_POST["password"] == "1234abcd") {
                    // Redirect to the admin panel
                    header("Location: econsave_details.php");
                    exit();
                } else {
                    // Display an error message
                    echo "<p style='color: red;'>Username and password do not match.</p>";
                }
            }
        ?>
    </div>

</body>
</html>
