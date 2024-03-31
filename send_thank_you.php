<?php
// Include the necessary Google API files
require_once 'vendor/autoload.php';

// Replace these values with your actual values
$clientSecretPath = 'C:\xampp\htdocs\Donor\client_secret_677113892283-3efhp7efaqeiuqvir7klesqcvr2bb7ua.apps.googleusercontent.com.json';
$accessTokenPath = 'C:\xampp\htdocs\Donor\client_secret_677113892283-3efhp7efaqeiuqvir7klesqcvr2bb7ua.apps.googleusercontent.com.json';
$senderEmail = 'sai243x@gmail.com';
$senderName = 'Saifuddin';

// Load the client secret JSON file
$clientSecretJson = json_decode(file_get_contents($clientSecretPath), true);

// Set up the Gmail API client
$client = new Google_Client();
$client->setAuthConfig($clientSecretJson);
$client->addScope(Google_Service_Gmail::GMAIL_SEND);
$client->setAccessType('offline');

// Load previously authorized credentials from a file
if (file_exists($accessTokenPath)) {
    $accessToken = json_decode(file_get_contents($accessTokenPath), true);
    $client->setAccessToken($accessToken);
}

// If the token is expired, refresh it
if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    file_put_contents($accessTokenPath, json_encode($client->getAccessToken()));
}

// Create the Gmail service
$service = new Google_Service_Gmail($client);

// Replace recipientEmail and recipientName with actual donor email and name
$recipientEmail = $_GET['email'];
$recipientName = 'Donor'; // You can customize this

// Compose the email message
$emailMessage = "Dear $recipientName,\n\nThank you for your generous donation! We appreciate your support.\n\nBest regards,\nYour Organization";

// Create the MIME message
$message = new Google_Service_Gmail_Message();
$message->setRaw(base64_encode("From: $senderName <$senderEmail>\r\nTo: $recipientName <$recipientEmail>\r\nSubject: Thank You for Your Donation\r\n\r\n$emailMessage"));

// Send the email
try {
    $service->users_messages->send('me', $message);
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Error sending email: ' . $e->getMessage();
}
?>
