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

if ($requestMethod === "POST") {
  $name = $_POST['user_name'];
  $password = $_POST['user_password'];

  $checkLogin = __HandleLogin__($name, $password, $__DB__);
  if ($checkLogin) {
    $sql = "SELECT * FROM users WHERE user_name='$name'";
    $query = $__DB__->SelectSingle($sql);
    $_SESSION['u_info'] = $query;
    $message = "Login Successfully";
    $status = true;
    $user_id = $query['id'];
    $user_role = $query['user_role'];
  } else {
    $message = "Invalid Username Or Password";
    $status = false;
  }
  echo json_encode(array(
    "status" => $status,
    "message" => $message,
    "user_role" => $user_role,
    "user_id" => $user_id
  ));
}



?>