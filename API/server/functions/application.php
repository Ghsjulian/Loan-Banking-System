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

function getIcon ($u_id) {
  $getSql = "SELECT user_avtar FROM users WHERE id='$u_id'";
  $data = $__DB__->__SELECT__($getSql);
  return $data['user_avtar'];
}

if ($requestMethod == "POST") {
  $user_id = $_SESSION['u_info']['id'];
  $bank = $_POST['bank_name'];
  $time = $_POST['time'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $amount = $_POST['amount'];
  $bank_number = $_POST['bank_number'];
  $phone_number = $_POST['phone_number'];
  $bvn_number = $_POST['bvn_number'];
  $nin_number = $_POST['nin_number'];
  $zip_code = $_POST['zip_code'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $home_address = $_POST['home_address'];
  $user_pic = $_SESSION['u_info']['user_avtar'];
  /*
  *
  * MAKING SQL QUERY
  *
  */
  $select = "SELECT user_id,user_name,user_email,phone_number,account_number FROM application WHERE user_id='$user_id'";
  if ($__DB__->__LOGIN__($select)) {
    echo json_encode(array(
      "status" => false,
      "message" => "You've Applied Already !"
    ));
  } else {
    $sql = "INSERT INTO `application`( `user_id`,`bank_name`, `user_name`, `user_email`, `phone_number`, `account_number`,`zip_code`,`city`,`state`,`home_address`,`bvn_number`,`nin_number`,`loan_amount`,`time`)VALUES('$user_id','$bank','$name','$email','$phone_number','$bank_number','$zip_code','$city','$state','$home_address','$bvn_number','$nin_number','$amount','$time')";
    $query = $__DB__->__INSERT__($sql);
    if ($query) {
      $text = "Applied For Getting Loan";
      $getSql = "SELECT user_avtar FROM users WHERE id='$user_id'";
      $avtar = $__DB__->SelectSingle($getSql);
      $userIcon = $avtar['user_avtar'];
      $sql_noti = "INSERT INTO `notification`(`user_id`, `user_name`, `notification`,`user_avtar`,`time`) VALUES ('$user_id','$name','$text','$userIcon','$time')";
      if ($__DB__->__INSERT__($sql_noti)) {
        $loansql = "INSERT INTO `loan_history`(`user_id`, `user_avtar`, `amount`, `notification`, `time`) VALUES ('$user_id','$user_pic','$amount','__ghs__','$time')";
        $__DB__->__INSERT__($loansql);
        echo json_encode(array(
          "status" => true,
          "message" => "Application successfully Submitted"
        ));
      }
      /*
    *
    *
    *
    *
    *
    */
    }
  }
}






if (isset($_GET['view_application'])) {
  $id = $_GET['view_application'];
  $getSql = "SELECT * FROM application WHERE user_id='$id'";
  $data = $__DB__->SelectSingle($getSql);
  echo json_encode($data);
  // echo $getSql;
}

/*
*
*
*
*

INSERT INTO `loan_history`(`id`, `user_id`, `user_avtar`, `amount`, `notification`, `time`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')

*
*
*
*
*/

if (isset($_GET['getApplication'])) {
  $user_id = $_SESSION['u_info']['id'];
  $getSql = "SELECT * FROM loan_history WHERE user_id='$user_id'";
  $data = $__DB__->SelectSingle($getSql);
  echo json_encode($data);
  // echo $getSql;
}
?>