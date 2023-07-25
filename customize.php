<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
if ($admin) {
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="src/assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="src/assets/css/home.css" />
    <link rel="stylesheet" href="src/assets/css/animation.css" />
    <link rel="stylesheet" href="src/assets/css/index.css" />
    <title>Portfolio | Ghs Julian Web Developer & Designer</title>
  </head>
  <body>
<?php
include_once('header.php');
?>
    <div class="hero">
      <div class="col">
        <h2>Customize Web Page</h2>
        <div class="list">
          <li onclick="Edit('logo_text')">
            <i class="bi bi-pen"></i>Edit Logo
          </li>
          <li id="logo" onclick="Edit('hero_text')">
            <i class="bi bi-pen"></i>Edit Hero Text
          </li>
          <li id="edit_1" onclick="Edit('hero_bottom')">
            <i class="bi bi-pen"></i>Edit Hero Botom Text
          </li>
          <li onclick="Edit('about_text')">
            <i class="bi bi-pen"></i>Edit About Section
          </li>
          <li onclick="Edit('contact_text')">
            <i class="bi bi-pen"></i>Edit Contact Section
          </li>
          <li onclick="Edit('service_text')">
            <i class="bi bi-pen"></i>Edit Services Area
          </li>
        </div>
      </div>
      <div style="display: none" id="edit-box" class="modal_edit">
        <h2>Edit Now</h2>
        <i onclick="CloseEdit()" class="bi bi-x"></i>
        <div id="order-form" class="contact-form">
          <form id="LoginForm">
          <input style="display :none" id="hidden_data" value="" hidden="true">
            <div id="suc-message"></div>
            <span class="message" style="display: none" id="message"></span>
            <textarea
              type="text"
              placeholder="Edit Logo"
              id="edit_box"
              name="user_name"
              value=""
            ></textarea>
            <button
              type="button"
              id="update_btn"
              name="contact-btn"
              onclick="UpdatPage()"
            >
              Update
            </button>
          </form>
        </div>
      </div>
    </div>
    <?php
include_once('footer.php');
?>
    <script src="src/assets/js/index.js"></script>
  </body>
</html>
<?php
}
?>