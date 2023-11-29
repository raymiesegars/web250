<?php
// Your other user creation logic goes here

// Verify reCAPTCHA
$recaptcha_secret_key = "6LdEtxwpAAAAANpK7UvnRrARb3pc4dF5zoyixpgq";
$recaptcha_response = $_POST['g-recaptcha-response'];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret' => $recaptcha_secret_key,
    'response' => $recaptcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$result_json = json_decode($result, true);

if ($result_json['success'] !== true) {
    // reCAPTCHA verification failed
    die('reCAPTCHA verification failed. Please go back and try again.');
}

// Continue with user creation logic
// ...
?>
