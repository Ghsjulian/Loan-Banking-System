<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
if ($admin) {
  header('location:dashboard');
} elseif ($user_id) {
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
<div class="section">
<div class="contact">
<h2>Enter Valid Information</h2>
<div class="contact-form">
<div id="message"></div>
<form id="application_form">
<select id="select_bank">
<option>Chose A Bank</option>
<option value="Access Bank Plc">Access Bank Plc</option>
<option value="Fidelity Bank Plc">Fidelity Bank Plc</option>
<option value="First City Monument Bank Limited">
First City Monument Bank Limited
</option>
<option value="Guaranty Trust Holding Company Plc">
Guaranty Trust Holding Company Plc
</option>
<option value="Union Bank of Nigeria Plc">
Union Bank of Nigeria Plc
</option>
<option value="United Bank for Africa Plc">
United Bank for Africa Plc
</option>
<option value="Zenith Bank Plc">Zenith Bank Plc</option>
<option value="Citibank Nigeria Limited">
Citibank Nigeria Limited
</option>
<option value="Ecobank Nigeria">Ecobank Nigeria</option>
<option value="Heritage Bank Plc">Heritage Bank Plc</option>
<option value="Keystone Bank Limited">
Keystone Bank Limited
</option>
<option value="Optimus Bank Limited">Optimus Bank Limited</option>
<option value="Polaris Bank Limited.">
Polaris Bank Limited.
</option>
<option value="Stanbic IBTC Bank Plc">
Stanbic IBTC Bank Plc
</option>
<option value="Standard Chartered">Standard Chartered</option>
<option value="Sterling Bank Plc">Sterling Bank Plc</option>
<option value="Titan Trust bank">Titan Trust bank</option>
<option value="Unity Bank Plc">Unity Bank Plc</option>
<option value="Wema Bank Plc">Wema Bank Plc</option>
<option value="Globus Bank Limited">Globus Bank Limited</option>
<option value="Parallex Bank Limited">
Parallex Bank Limited
</option>
<option value="PremiumTrust Bank Limited">
PremiumTrust Bank Limited
</option>
<option value="Providus Bank Limited">
Providus Bank Limited
</option>
<option value="SunTrust Bank Nigeria Limited">
SunTrust Bank Nigeria Limited
</option>
<option value="Jaiz Bank Plc">Jaiz Bank Plc</option>
<option value="LOTUS BANK">LOTUS BANK</option>
<option value="TAJBank Limited">TAJBank Limited</option>
</select>
<input
type="text"
placeholder="Enter Full Name"
id="name"
name="name"
/>
<input
type="email"
placeholder="Enter Email Address"
id="email"
name="email"
/>
<input
type="number"
placeholder="Enter Loan Amount"
id="amount"
name="amount"
/>
<input
type="number"
placeholder="Your Bank Number"
id="bank_number"
name="bank_number"
/>
<input
type="number"
placeholder="Your Phone Number"
id="phone_number"
name="phone_number"
/>
<input
type="number"
placeholder="Your BVN Number"
id="bvn_number"
name="bvn_number"
/>
<input
type="number"
placeholder="Enter NIN Number"
id="nin_number"
name="nin_number"
/>
<input
type="number"
placeholder="Enter ZIP/Post Code"
id="zip_code"
name="zip_code"
/>
<input type="text" placeholder="Enter City" id="city" name="city" />
<input
type="text"
placeholder="Enter State"
id="state"
name="state"
/>
<input
type="text"
placeholder="Enter Home Address"
id="home_address"
name="home_address"
/>

<button onclick="Apply()" type="button" id="btn" name="contact-btn">
Apply Now
</button>
</form>
</div>
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
} else {
  header('location:login');
}
?>