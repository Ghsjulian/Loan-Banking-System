<?php
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

if (isset($_POST['action'])) {
  $subject = $_POST['subject'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $to = "ghsjulian@gmail.com";
  $from = "From:$email";

 // echo $subject.$from.$message;
  if (mail($to, $subject, $message, $from)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Email Sent Successfully !",
    ));
  } else {
    echo json_encode(array(
      "status" => false,
      "message" => "Email Sent Failed !",
    ));
  }

}


?>