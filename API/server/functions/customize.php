<?php
session_start();
echo $_SESSION['u_id'];
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

/*
*
*
*  FETCHING ALLL INFORMATION
*
*/

if (isset($_GET['fetch_web'])) {
  $sql = "SELECT * FROM customize";
  $query = $__DB__->SelectSingle($sql);
  echo json_encode($query);
}

/*
*
*    GETTING PAGES
*
*/


if (isset($_GET['edit_name'])) {
  $tbl_name = $_GET['edit_name'];
  $sql = "SELECT * FROM customize";
  $query = $__DB__->SelectSingle($sql);
  echo $query[$tbl_name];
}

/*
*
*
* UPDATE WEB PAGE INFO
*
*/

if (isset($_POST['col_name'])) {
  $id = $_POST['col_name'];
  $data = $_POST['data'];
  $sql = "UPDATE customize SET $id='$data' WHERE 1";
  $query = $__DB__->__INSERT__($sql);
  if ($query) {
    echo true;
  }
}


if (isset($_GET['fethwebinfo'])) {
  $users = count($__DB__->__SELECT__("SELECT * FROM users"));
  $total_notifications = count($__DB__->__SELECT__("SELECT * FROM notification"));
 // $loan = count($__DB__->__SELECT__("SELECT * FROM users"));
 echo json_encode(array(
   "users"=>$users,
   "notification"=>$total_notifications
   ));
}

?>