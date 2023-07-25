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
<title>Sign In Your Account | Sign In | Login Now</title>
</head>
<body>
<div id="root">
<div class="main">
<h1 class="home-logo">Login Now</h1>
<center>
<div class="col">
<div id="order-form" class="contact-form">
<form id="LoginForm">
<div id="suc-message"></div>
<span class="message" style="display: none" id="message"></span>
<input
type="text"
placeholder="Enter User Name"
id="user_name"
name="user_name"
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
onclick="LogIn()"
>
Login
</button>
</form>
</div>
</div>
<strong id="text"
>Dont Have An Account?
<a id="log_in" href="signup.html">Signup</a></strong
>
<div class="area">
<strong>Forget Password ?</strong
><a id="reset" onclick="Reset()" href="#">Reset Now</a>
</div>
</center>
</div>
</div>
<div style="display: none" class="modal" id="modal-box">
<span onclick="Close()">X</span>
<div class="col">
<div id="order-form" class="contact-form">
<form id="LoginForm">
<div id="suc-message"></div>
<span class="message" style="display: none" id="message"></span>
<label for="email"></label>
<input
type="email"
placeholder="Enter Email Address"
id="email"
name="email"
accept="email"
/>
<input
style="display: none"
type="password"
placeholder="Enter Your Password"
id="password"
name="password"
/>
<button
type="button"
id="update_btn"
name="contact-btn"
onclick="ChekNow()"
>
Submit
</button>
</form>
</div>
</div>
</div>
<script src="src/assets/js/signup.js"></script>
</body>
</html>
<?php
}
?>