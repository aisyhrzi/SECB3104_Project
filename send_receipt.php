<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodName = $_POST["foodName"];
    $quantity = $_POST["quantity"];
    
    $to = "aisyah.mn@graduate.utm.my";
    $subject = "Receipt from FoodBank.MY";
    $message = "Food Name: $foodName\nQuantity: $quantity";

    // Gmail SMTP settings
    $smtp_server = "smtp.gmail.com";
    $smtp_username = "zerowaste.fbmy@gmail.com";
    $smtp_password = "zerowaste123";
    $smtp_port = 587;

    $headers = "From: zerowaste.fbmy@gmail.com";

    // Configure PHP to use Gmail's SMTP server
    ini_set("SMTP", $smtp_server);
    ini_set("smtp_port", $smtp_port);

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Invalid request.";
}
?>
