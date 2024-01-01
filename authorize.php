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

    return $client;
}

// Get the Gmail API client
$client = getClient();

// Check if the authorization code is in the URL
if (isset($_GET['code'])) {
    $authCode = $_GET['code'];

    // Exchange authorization code for an access token
    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
    $client->setAccessToken($accessToken);

    // Save the token to a file
    $tokenPath = 'token.json';
    file_put_contents($tokenPath, json_encode($client->getAccessToken()));
    echo 'Authorization successful!';
} else {
    // Redirect the user to the Google authorization page
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
    exit();
}
