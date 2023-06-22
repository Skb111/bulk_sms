<?php

// API credentials
$username = 'your_username';
$password = 'your_password';

// SMS details
$sender = 'YourSenderID';
$message = 'This is a bulk SMS message.';
$numbers = ['1234567890', '9876543210', '5555555555']; // Array of recipient numbers

// API URL
$url = 'http://api.example.com/sms/send';

// Prepare data
$data = [
    'username' => $username,
    'password' => $password,
    'sender' => $sender,
    'message' => $message,
    'numbers' => implode(',', $numbers),
];

// Send request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Process response
if ($response === false) {
    echo 'Error occurred during API request: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    if ($result['success']) {
        echo 'SMS sent successfully.';
    } else {
        echo 'Failed to send SMS. Error: ' . $result['error'];
    }
}

?>

