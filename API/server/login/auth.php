<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/

require_once '../database/__DB__.php';
require_once '__HandleLogin__.php';
$message = "";
$status = "";
$user_id = "";
$user_role = "";
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$requestMethod = $_SERVER["REQUEST_METHOD"];

if (isset($_POST['check_email'])) {
  $email = $_POST['email'];
  if ($__DB__->__LOGIN__("SELECT user_email FROM users WHERE user_email='$email'")) {
    echo json_encode(array(
      "status" => true,
      "message" => "User Exist"
    ));
  } else {
    echo json_encode(array(
      "status" => false,
      "message" => "User Doesn't Exist"
    ));
  }
}


if(isset($_POST['reset_password'])){
  $email = $_POST['email'];
  $password = trim($_POST['password']);
  $enc_password = sha1($password);
  $sql = "UPDATE users SET user_password='$enc_password' WHERE user_email='$email'";
  $query = $__DB__->__INSERT__($sql);
  if ($query) {
    echo json_encode(array(
      "message" => "Password Reset Successfully !",
      "status" => true,
    ));
  } else {
    echo json_encode(array(
      "message" => "Password Reset Failed !",
      "status" => false,
    ));
  }
}



?>