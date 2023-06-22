<?php
// API credentials
$apiKey = 'your_api_key';

// Retrieve form data
$sender = $_POST['sender'];
$message = $_POST['message'];
$numbers = $_POST['numbers']; // Assuming 'numbers' is an array of recipient numbers

// API URL
$url = 'http://api.example.com/sms/send';

// Prepare data
$data = [
    'apiKey' => $apiKey,
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
    $alertMessage = 'Error occurred during API request: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    if ($result['success']) {
        $alertMessage = 'SMS sent successfully.';
    } else {
        $alertMessage = 'Failed to send SMS. Error: ' . $result['error'];
    }
}

echo "<script>alert('$alertMessage');</script>";
?>
