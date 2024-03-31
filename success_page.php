<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .success-message {
            background-color: #4caf50;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="success-message">
    <h2>Sign Up Successful!</h2>
    <p>Your account has been created successfully.</p>
    <p><a href="login<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password (you can add your own validation logic here)
    if (($username === 'izat' && $password === 'izat123') || ($username === 'aisyah' && $password === 'aisyah123') || ($username === 'fatihah' && $password === 'fatihah123') || ($username === 'maathu' && $password === 'maathu123') ) {
        // Check if the user is already stored in the session
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = array(); // Create an empty array to store users
        }

        // Add the current user to the session
        $_SESSION['users'][] = array('username' => $username);

        // Set the cookie with the username
        $cookieName = 'username';
        $cookieValue = $username;
        $cookieExpiration = time() + 3600; // Cookie will expire in 1 hour
        setcookie($cookieName, $cookieValue, $cookieExpiration);

        header('Location: role.php'); // Redirect to the welcome page
        exit();
    } else {
        // If the credentials are invalid, display an error message
        echo 'Invalid username or password. Please try again.';
    }
} elseif (isset($_COOKIE['username'])) {
    // If the cookie exists, retrieve the username and set the session variable
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: role.php'); // Redirect to the welcome page
    exit();
}
?>.php">Login</a> to access your account.</p>
</div>

</body>
</html>
