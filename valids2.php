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
            color: #fff;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
            color: black; /* Set label color to black */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            cursor: pointer;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
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