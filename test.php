<?php

use Twilio\Rest\Client;
if (isset($_POST['btn'])) {
    require __DIR__ . '/vendor/autoload.php';
    
    
    // Replace with the names of your environment variables
    $accountSidEnv = 'SENDERID';
    $authTokenEnv = 'TOKEN';
    
    // Retrieve the values from environment variables
    $account_sid = $accountSidEnv;
    $auth_token = $authTokenEnv;
    
    // Check if the required environment variables are set
    if (!$account_sid || !$auth_token) {
        echo "Missing Twilio credentials. Please check your environment variables.";
        exit;
    }
    
    // A Twilio number you own with SMS capabilities
    $twilio_number = "+TWILIO PHONE";
    
    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        '+19143089421',
        array(
            'from' => $twilio_number,
            'body' => 'I sent this message in under 10 minutes!'
        )
    );
}
?>

