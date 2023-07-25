<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
if ($admin) {
  header('location:dashboard');
} elseif ($user_id) {
  header('location:index.php');
} else {
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#000000" />
<meta
name="description"
content="Web site created using create-react-app"
/>
<link rel="stylesheet" href="src/assets/css/App.css" />
<link rel="stylesheet" href="src/assets/css/Responsive.css" />
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
/>
<title>Create An Account | Sign Up | Create New Account</title>
</head>
<body>
<div id="root">
<div class="main">
<h1 class="home-logo">Register Now</h1>
<p>
Welcome To St.Famscilla Thrift And Loans.
</p>
<center>
<div class="col">
<div id="order-form" class="contact-form">
<form id="SignupForm">
<img id="preview" style="display: none" src="__ghs__" />
<div class="avtar">
<label for="project_image"> + </label>
</div>
<input
style="display: none"
type="file"
name="user_image"
id="project_image"
accept="images/*"
onchange="loadFile(event)"
/>
<div id="suc-message"></div>
<span class="message" style="display: none" id="message"></span>
<input
type="text"
placeholder="Enter User Name"
id="user_name"
name="user_name"
/>
<input
type="email"
placeholder="Enter User Email"
id="user_email"
name="user_email"
/>
<input
type="number"
placeholder="Enter Phone Number"
id="phone_number"
name="phone_number"
/>
<input
type="password"
placeholder="Enter Your Password"
id="user_password"
name="user_password"
/>
<button
type="button"
id="update_btn"
name="contact-btn"
onclick="SignUp()"
>
Register
</button>
</form>
</div>
</div>
<strong id="text"
>Already Have An Account? <a id="log_in" href="#">Login</a></strong
>
</center>
</div>
</div>
<script src="src/assets/js/signup.js"></script>
</body>
</html>
<?php
} ?>