<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
if ($admin) {
  header('location:http://localhost:8000/Bank/dashboard');
} else {
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
<h2>Available Limit <a id="getNow" href="http://localhost:8000/Bank/apply">Get Now</a></h2>
<h1 id="price">12,00,000.00 <i class="bi bi-coin"></i></h1>
</div>
<div class="col">
<h1 id="dev">Welcome To St.Famscilla And Loan</h1>
<p class="hero-top" id="intro"></p>
<?php
if (!$session['id']) {
?>
<div class="button-area">
<a id="hire" href="http://localhost:8000/Bank/login">Login</a>
<a id="cv" href="http://localhost:8000/Bank/signup">Signup</a>
</div>
<?php
} ?>
</div>
<div class="col">
<p class="hero-bottom" id="intro"></p>
</div>
</div>
<?php
include_once('footer.php');
?>
<script src="src/assets/js/index.js"></script>
<script src="src/assets/js/customize.js"></script>
</body>
</html>
<?php
} 
?>