<?php
// Simple authentication logic (replace with a secure authentication method)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password are valid (for demonstration purposes)
    if ($username === 'admin' && $password === 'admin123') {
        // Authentication successful, redirect to the desired page
        header('Location: adminInterface.php');
        exit;
    } else {
        // Authentication failed, redirect back to the login page with an error message
        header('Location: adminlogin.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <!-- Google Fonts Links For Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background: #000;
        }

        body::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0.5;
            width: 100%;
            height: 100%;
            background: rgb(65,105,225);
            background-position: center;
        }

        nav {
            position: fixed;
            padding: 25px 60px;
            z-index: 1;
        }

        nav a img {
            width: 167px;
        }

        .form-wrapper {
            position: absolute;
            left: 50%;
            top: 50%;
            border-radius: 4px;
            padding: 70px;
            width: 450px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .75);
        }

        .form-wrapper h2 {
            color: #fff;
            font-size: 2rem;
        }

        .form-wrapper form {
            margin: 25px 0 65px;
        }

        form .form-control {
            height: 50px;
            position: relative;
            margin-bottom: 16px;
        }

        .form-control input {
            height: 100%;
            width: 100%;
            background: #333;
            border: none;
            outline: none;
            border-radius: 4px;
            color: #fff;
            font-size: 1rem;
            padding: 0 20px;
        }

        .form-control input:is(:focus, :valid) {
            background: #444;
            padding: 16px 20px 0;
        }

        .form-control label {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            pointer-events: none;
            color: #8c8c8c;
            transition: all 0.1s ease;
        }

        .form-control input:is(:focus, :valid)~label {
            font-size: 0.75rem;
            transform: translateY(-130%);
        }

        form button {
            width: 100%;
            padding: 16px 0;
            font-size: 1rem;
            background: blue;
            color: #fff;
            font-weight: 500;
            border-radius: 4px;
            border: none;
            outline: none;
            margin: 25px 0 10px;
            cursor: pointer;
            transition: 0.1s ease;
        }

        form button:hover {
            background: rgb(65,105,225);
        }

        .form-wrapper a {
            text-decoration: none;
        }

        .form-wrapper a:hover {
            text-decoration: underline;
        }

        .form-wrapper :where(label, p, small, a) {
            color: #b3b3b3;
        }

        form .form-help {
            display: flex;
            justify-content: space-between;
        }

        form .remember-me {
            display: flex;
        }

        form .remember-me input {
            margin-right: 5px;
            accent-color: #b3b3b3;
        }

        form .form-help :where(label, a) {
            font-size: 0.9rem;
        }

        .form-wrapper p a {
            color: #fff;
        }

        .form-wrapper small {
            display: block;
            margin-top: 15px;
            color: #b3b3b3;
        }

        .form-wrapper small a {
            color: #0071eb;
        }

        @media (max-width: 740px) {
            body::before {
                display: none;
            }

            nav, .form-wrapper {
                padding: 20px;
            }

            nav a img {
                width: 140px;
            }

            .form-wrapper {
                width: 100%;
                top: 43%;
            }

            .form-wrapper form {
                margin: 25px 0 40px;
            }
        }
    </style>
    <script>
        <?php
        // Check if there is an error parameter in the URL
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            // Display a JavaScript alert for incorrect login details
            echo "window.onload = function() { alert('Incorrect login details. Please try again.'); }";
        }
        ?>
    </script>
</head>
<body>
    <nav>
        <a href="#"><img src="logocantik.png" alt="logo"></a>
    </nav>
    <div class="form-wrapper">
        <h2>Sign In</h2>
        <form action="adminlogin.php" method="post">
            <div class="form-control">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit">Sign In</button>
            <div class="form-help"> 
                <div class="remember-me">
                </div>
            </div>
        </form>
        <small>
            This page is protected by Google reCAPTCHA to ensure you're not a bot. 
            <a href="login.php">Not an Admin? Click Here.</a>
        </small>
    </div>
</body>
</html>