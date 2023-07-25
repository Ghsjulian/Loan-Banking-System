<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
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
<div style="width:100%" class="column">
<h2>Admin Dashboard</h2>
</div>
<div class="col">
<div class="card">
<div class="ico">
<i class="bi bi-currency-dollar"></i>
</div>
<h2>Total Loan</h2>
<h2>3,45,000.06</h2>

</div>
</div>
<div class="col">
<div class="card">
<div class="ico">
<i class="bi bi-people"></i>
</div>
<h2>Total Users</h2>
<h2>5739</h2>
</div>
</div>
<div class="col">
<div class="card">
<div class="ico">
<i class="bi bi-bar-chart"></i>
</div>
<h2>Visitors Info</h2>
<h2>78,067.06</h2>
</div>
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
} else {
header('location:http://localhost:8000/Bank/login');
}
?>