<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/
require_once '../database/__DB__.php';
$message = "";
$status = "";
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];

//$payment = $_SESSION['paymentInfo'];
$paid = $_SESSION['paidInfo'];


$user_id = $paid['user_id'];
$user_name = $paid['user_name'];


$sql = "INSERT INTO `loan_paid`(`user_id`, `user_name`, `payment_id`, `transition_id`) VALUES ('$user_id','$user_name','ghs','ghs')";
$query = $__DB__->__INSERT__($sql);
if ($query) {
  $delete = "DELETE FROM paid WHERE user_id='$user_id'";
  $__DB__->__INSERT__($delete);
  header("location: http://localhost:8000/Bank");
}

?>