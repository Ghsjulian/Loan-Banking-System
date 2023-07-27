<?php
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/index.css" />
<title>Stripe</title>
</head>
<body>
<h1>Stripe</h1>
<button id="btn">
<form action="payment.php" method="POST">
<script
src="https://checkout.stripe.com/checkout.js"
class="stripe-button"
data-key="<?php echo $Publishable_key ?>"
data-name="Ghs Julian"
data-amount="5000"
data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0z_zdencC0t6J-OCkmNtMC05S4KuTZjKgyA&usqp=CAU"
data-currency="usd"
data-label="Pay Now"
data-email="ghsjulian@gmail.com"
></script>
</form>
</button>
</body>
</html>