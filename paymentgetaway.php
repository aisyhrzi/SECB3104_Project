<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve user input
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
    $donate = isset($_GET["donate"]) ? floatval($_GET["donate"]) : 0;
    $user_email = isset($_GET["email"]) ? $_GET["email"] : null;  // Add this line to get user email

    // Debugging: Output received data
    echo "User ID: " . $id . "<br>";
    echo "User Email: " . $user_email . "<br>";  // Output user email for debugging
    echo "Donation Amount: " . $donate . "<br>";

    // Validate user input
    if (!$id || $donate <= 0) {
        echo "Invalid user ID or donation amount.";
        exit();
    }

    // Set your Stripe secret key
    $stripe_secret_key = "sk_test_51OJ8gNFdgAKbVCfkNN5i014cHRRxpMTmhYZ3ezMDZjxrioAXMyFTCiPk52JkNmEx0NXs0533se2dZJySkFWnAncT00WLa3ENEG";
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    // Create a Checkout Session
    try {
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            "success_url" => "https://accounts.google.com/o/oauth2/v2/auth/oauthchooseaccount?response_type=code&access_type=offline&client_id=725344171413-4crubt743dckgqv8d2h3bu0ifcklul8s.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Freceiver-sprint1%2Freceiver-sprint1%2Fbill.php&state&scope=https%3A%2F%2Fmail.google.com%2F&prompt=select_account%20consent&service=lso&o2v=2&theme=glif&flowName=GeneralOAuthFlow",
            "cancel_url" => "http://localhost/receiver-sprint1/receiver-sprint1/Donationdetails.php",
            "locale" => "auto",
            "payment_method_types" => ["card", "grabpay", "fpx", "alipay"],
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => "myr",
                        "unit_amount" => $donate * 100, // Convert the amount to cents
                        "product_data" => [
                            "name" => "Donation",
                            "images" => ["https://i.pinimg.com/564x/0e/b6/7e/0eb67e2b1b90a2ab6c639c7b75b6db41.jpg"]
                        ],
                    ],
                ],
            ],
            "customer_email" => $user_email,  // Add this line to include user email
        ]);

        // Debugging: Output success
        echo "Checkout session created successfully.<br>";

        // Redirect to the Checkout session
        header("Location: " . $checkout_session->url);
        exit();
    } catch (\Stripe\Exception\ApiErrorException $e) {
        // Stripe API Error
        echo 'Stripe API Error: ' . $e->getMessage();
        exit();
    } catch (\Exception $e) {
        // Other Errors
        echo 'Error: ' . $e->getMessage();
        exit();
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    die("Invalid request");
}
?>
