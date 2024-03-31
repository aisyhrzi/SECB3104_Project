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
    // The file token.json stores the user's access and refresh tokens and is
    // created automatically when the authorization flow completes for the first time.
    $tokenPath = 'token.json';
    if (file_exists($tokenPath)) {
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);
    }

    // If there is no previous token or it's expired.
    if ($client->isAccessTokenExpired()) {
        // Refresh the token if possible, else fetch a new one.
        if ($client->getRefreshToken()) {
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
        } else {
            // Request authorization from the user.
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n%s\n", $authUrl);
            print 'Enter verification code: ';
            $authCode = trim(fgets(STDIN));

            // Exchange authorization code for an access token.
            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
            $client->setAccessToken($accessToken);

            // Check to see if there was an error.
            if (array_key_exists('error', $accessToken)) {
                throw new Exception(join(', ', $accessToken));
            }
        }
        // Save the token to a file.
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

    // Create MIME message
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
$to = 'Zihanizhar@graduate.utm.my'; // replace with the recipient's email
$subject = 'Test Email';
$message = 'This is a test email sent using the Gmail API.';

// Send the email
sendEmail($service, $sender, $to, $subject, $message);
?>
