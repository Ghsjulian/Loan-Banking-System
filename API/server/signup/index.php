<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/
require_once '../database/__DB__.php';
require_once '__HandleSignup__.php';
$message = "";
$status = "";
$token = "";
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
  $name = trim($_POST['user_name']);
  $email = trim($_POST['user_email']);
  $phone = trim($_POST['phone_number']);
  $password = trim($_POST['user_password']);
  $user_avtar = $_FILES['user_image']['name'];
  $random = substr(md5(mt_rand()), 0, 5);
  $user_avtar = "ghs__".$random.".jpg";
  $image_tmp = $_FILES['user_image']['tmp_name'];
  $dir = "../users_avtar/";
  $data = array(
    "user_name" => $name,
    "user_email" => $email,
    "user_phone" => $phone,
    "user_password" => $password,
    "user_avtar"=>$user_avtar
  );

  $sql = "SELECT * FROM users WHERE user_name='$name' AND user_email='$email'";
  $query = $__DB__->__isExist__($sql);
  if ($query) {
    $signup = __HandleSignup__($data, $__DB__);
    if ($signup) {
      move_uploaded_file($image_tmp, $dir.$user_avtar);
      $status = true;
      $message = "Registration Successfully!";
    } else {
      $status = false;
      $message = "Registration Failed!";
    }
  } else {
    $status = false;
    $message = "User Already Registered";
  }
  echo json_encode(array(
    "status" => $status,
    "message" => $message
  ));
}
?>