<?php
require_once 'auth.php';
function __HandleSignup__($data, $_db_) {
  $user_name = trim($data['user_name']);
  $user_email = trim($data['user_email']);
  $user_phone = trim($data['user_phone']);
  $avtar = $data['user_avtar'];
  $user_pass = trim($data['user_password']);
  $enc_password = sha1($user_pass);

  if ($user_name && $user_pass) {
    $sql = "INSERT INTO users (user_name,user_email,user_password,user_phone,user_avtar) VALUES('$user_name','$user_email','$enc_password','$user_phone','$avtar')";
    $query = $_db_->__SIGNUP__($sql);
    if ($query) {
      return true;
    } else {
      return 0;
    }
  }



}





?>