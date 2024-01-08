<?php

require __DIR__ . '/vendor/autoload.php';

// Function to get the Gmail API client
function getClient()
{
    $client = new Google\Client();
    $client->setApplicationName('Gmail API PHP Quickstart');
    $client->setScopes(Google_Service_Gmail::MAIL_GOOGLE_COM);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');

    // Load previously authorized token from a file, if it exists.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    if ($client->isAccessTokenExpired()) {
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }

        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    }
    
    return $client;
}

// Function to send an email
function sendEmail($service, $sender, $to, $subject, $messageBody)
{
    $message = new Google\Service\Gmail\Message();

    $mime = rtrim(strtr(base64_encode($messageBody), '+/', '-_'), '=');
    $rawMessage = "From: $sender\r\n";
    $rawMessage .= "To: $to\r\n";
    $rawMessage .= "Subject: $subject\r\n";
    $rawMessage .= "MIME-Version: 1.0\r\n";
    $rawMessage .= "Content-Type: text/plain; charset=utf-8\r\n";
    $rawMessage .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $rawMessage .= "$mime\r\n";

    $message->setRaw(base64_encode($rawMessage));

    try {
        $sentMessage = $service->users_messages->send('me', $message);
        echo 'Email sent! Message ID: ' . $sentMessage->getId();
    } catch (Exception $e) {
        echo 'Error sending email: ' . $e->getMessage();
    }
}

// Get the Gmail API client
$client = getClient();
$service = new Google\Service\Gmail($client);

// Set your email details
$sender = 'nur.aisyah.fatihah@graduate.utm.my'; // replace with your email
$subject = 'Donation Receipt';
$message = ' Thank you for making a donation for us.
    Your generous contribution will make a difference.
';

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

// Fetch email addresses from the sign-up table
$sql = "SELECT email FROM signup";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each email address and send the email
    while ($row = $result->fetch_assoc()) {
        $to = trim($row['email']);

        // Check for empty or invalid email addresses
        if (!empty($to)) {
            // Send the email
            sendEmail($service, $sender, $to, $subject, $message);
        } else {
            echo "Skipping empty/invalid email address.\n";
        }
    }
} else {
    echo "No email addresses found in the sign-up table.\n";
}

// Close the database connection
$conn->close();
?>