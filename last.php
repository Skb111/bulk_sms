<?php

if (isset($_POST['btn'])) {
    require __DIR__ . '/vendor/autoload.php';

    $basic  = new \Vonage\Client\Credentials\Basic("a75a872c", "1cvnyX3F3ZzKnlJg");
    $client = new \Vonage\Client($basic);

    $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS("16123619738", 'VonageAPI', 'A text message sent using the Nexmo SMS API')
    );
    
    $message = $response->current();
    
    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }
}
?>

