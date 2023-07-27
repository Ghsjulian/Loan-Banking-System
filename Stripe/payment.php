<?php
session_start();
require('config.php');
\Stripe\Stripe::setVerifySslCerts(false);
$token = $_POST['stripeToken'];
if ($token) {
  $data = \Stripe\Charge::create(array(
    "amount" => 500,
    "currency" => "usd",
    "description" => "Web Developer Ghs Julian",
    "source" => $token
  ));
 $_SESSION['paymentInfo']=$data;
 // print_r($data);
 header("location: http://localhost:8000/Bank/API/server/functions/save-payment.php");
}
?>