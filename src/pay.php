<?php
require_once __DIR__.'/config.php';

$email = $_POST['email'];
$amount = $_POST['amount'] * 100;

$postdata = json_encode(['email' => $email, 'amount' => $amount]);

$ch = curl_init("https://api.paystack.co/transaction/initialize ");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer " . PAYSTACK_SECRET_KEY, "Content-Type: application/json"]);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
if ($data['status']) header("Location: " . $data['data']['authorization_url']);
else die("Error: " . $data['message']);
?>
