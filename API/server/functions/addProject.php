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

if ($requestMethod === "POST") {
  $project_image = $_FILES['project_image']['name'];
  $random = substr(md5(mt_rand()), 0, 5);
  $project_image = "ghs__".$random.".jpg";
  $image_tmp = $_FILES['project_image']['tmp_name'];
  $dir = "../projects/";
  $project_name = trim($_POST['project_name']);
  $project_url = trim($_POST['project_url']);
  $project_description = trim($_POST['project_description']);

  $sql = "INSERT INTO latest_projects(project_name, project_description, project_image,project_url) VALUES ('$project_name','$project_description','$project_image','$project_url')";

  $query = $__DB__->__INSERT__($sql);
  if ($query) {
    move_uploaded_file($image_tmp, $dir.$project_image);
    echo json_encode(array(
      "message" => "Project Added !",
      "status" => true,
    ));
  }
}
?>