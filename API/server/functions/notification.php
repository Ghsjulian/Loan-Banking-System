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

if (isset($_GET['count'])) {
  $sql = "SELECT * FROM notification";
  $query = $__DB__->__SELECT__($sql);
  echo count($query);
}
if (isset($_GET['fetch'])) {
  $sql = "SELECT * FROM notification";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}

if (isset($_GET['user_id'])) {
  $id = $_GET['user_id'];
  $getSql = "SELECT user_avtar FROM users WHERE id='$id'";
  $data = $__DB__->SelectSingle($getSql);
  echo json_encode($data);
}


?>