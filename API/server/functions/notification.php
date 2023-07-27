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
  if ($query) {
    echo count($query);
  } else {
    echo 0;
  }
}
if (isset($_GET['fetch'])) {
  $sql = "SELECT * FROM notification";
  $query = $__DB__->__SELECT__($sql);
  if ($query) {
    echo json_encode($query);
  }
}

if (isset($_GET['user_id'])) {
  $id = $_GET['user_id'];
  $getSql = "SELECT user_avtar FROM users WHERE id='$id'";
  $data = $__DB__->SelectSingle($getSql);
  echo json_encode($data);
}

if (isset($_GET['user_noti'])) {
  $user_id = $_SESSION['u_info']['id'];
  $sql = "SELECT * FROM users WHERE id='$user_id'";
  $query = $__DB__->SelectSingle($sql);
  if ($query) {
    if($query['verification']==1){
      $update = "UPDATE users SET verification='0' WHERE id='$user_id'";
      $__DB__->__INSERT__($update);
    } 
  } else {
    echo 0;
  }
}

?>