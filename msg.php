<?php

if (isset($_POST['btn'])) {
  $numbers = $_POST['number'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $apiKey = "My api key";

  // Convert the numbers into an array
  $recipients = explode(',', $numbers);

  foreach ($recipients as $recipient) {
    $data = [
      'to' => $recipient,
      'message' => $message,
      'sender_name' => 'SAlert',
      'subject' => $subject,
      'route' => 'dnd'
    ];

    $jsonData = json_encode($data);

    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.sendchamp.com/api/v1/sms/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $jsonData,
      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err . "<br>";
    } else {
      echo "Message sent to " . $recipient . ": " . $response . "<br>";
    }
  }
}

?>
