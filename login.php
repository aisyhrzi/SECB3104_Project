<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these credentials with your actual database credentials
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";
    
    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM details WHERE username = ?");
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned a matching user
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password using password_verify()
        if (password_verify($enteredPassword, $row['password'])) {
            // Authentication successful, start a session
            session_start();
            // Store user information in session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Add other user-related information as needed

            // Redirect to the desired page
            header("Location: userdetails.php");
            exit();
        } else {
            // Authentication failed, set an error message
            $error_message = "Invalid username or password. Please try again.";
        }
    } else {
        // User not found, set an error message
        $error_message = "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodBank.My Login Page</title>
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
            background: url("https://www.zdnet.com/a/img/resize/7928be58006d42770318cb8b31ab52fe25e1345e/2022/10/27/0089a944-0148-4741-a449-9607bf810e2a/gettyimages-1125756387.jpg?auto=webp&width=1280");
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
            background: #37bb3d;
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
            background: #19912d;
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
</head>
<body>
    <nav>
        <a href="#"><img src="logo.png" alt="logo"></a>
    </nav>
    <div class="form-wrapper">
        <h2>Sign In</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return signIn()">
            <div class="form-control">
                <input type="text" name="username" id="username" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
            <button type="submit">Sign In</button>
            <div class="form-help"> 
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="#">Need help?</a>
            </div>
        </form>
        <p>New to FoodBank.My? <a href="signup.php">Sign up now</a></p>
        <small>
            This page is protected by Google reCAPTCHA to ensure you're not a bot. 
            <a href="#">Learn more.</a>
        </small>
    </div>

    <script>
        function signIn() {
    // The function now relies on server-side PHP code for authentication
    return true;
}
    </script>
</body>
</html><?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these credentials with your actual database credentials
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodbank";
    
    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM details WHERE username = ?");
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned a matching user
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password using password_verify()
        if (password_verify($enteredPassword, $row['password'])) {
            // Authentication successful, start a session
            session_start();
            // Store user information in session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            // Add other user-related information as needed

            // Redirect to the desired page
            header("Location: userdetails.php");
            exit();
        } else {
            // Authentication failed, set an error message
            $error_message = "Invalid username or password. Please try again.";
        }
    } else {
        // User not found, set an error message
        $error_message = "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodBank.My Login Page</title>
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
            background: url("https://www.zdnet.com/a/img/resize/7928be58006d42770318cb8b31ab52fe25e1345e/2022/10/27/0089a944-0148-4741-a449-9607bf810e2a/gettyimages-1125756387.jpg?auto=webp&width=1280");
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
            background: #37bb3d;
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
            background: #19912d;
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
</head>
<body>
    <nav>
        <a href="#"><img src="logo.png" alt="logo"></a>
    </nav>
    <div class="form-wrapper">
        <h2>Sign In</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return signIn()">
            <div class="form-control">
                <input type="text" name="username" id="username" required>
                <label>Username</label>
            </div>
            <div class="form-control">
                <input type="password" name="password" id="password" required>
                <label>Password</label>
            </div>
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
            <button type="submit">Sign In</button>
            <div class="form-help"> 
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="#">Need help?</a>
            </div>
        </form>
        <p>New to FoodBank.My? <a href="signup.php">Sign up now</a></p>
        <small>
            This page is protected by Google reCAPTCHA to ensure you're not a bot. 
            <a href="#">Learn more.</a>
        </small>
    </div>

    <script>
        function signIn() {
    // The function now relies on server-side PHP code for authentication
    return true;
}
    </script>
</body>
</html>
