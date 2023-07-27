<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
require('Stripe/config.php');
if ($user_id) {
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
<div class="column">
<h2><i class="bi bi-currency-exchange"></i> Your Loan History</h2>
<h2 id="currentbalance">Current Balance</h2>
<div id="money">
<h3 id="usd">0$</h3>
<input id="user_id" type="number" value="" hidden="true" />
</div>
<p id="info">
You can download your loan info , or pay your loan . once you pay your
current loan you can apply again for getting new amount . Stay
connected with us.

</p>
<div style="display: none" class="pay">

<form action="Stripe/payment.php" method="POST">
<script
src="https://checkout.stripe.com/checkout.js"
class="stripe-button"
data-key="<?php echo $Publishable_key ?>"
data-name="<?php echo $_SESSION['paidInfo']['user_name'] ?>"
data-amount="<?php echo $_SESSION['paidInfo']['loan_amount'] ?>"
data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0z_zdencC0t6J-OCkmNtMC05S4KuTZjKgyA&usqp=CAU"
data-currency="usd"
data-label="Pay Now"
data-email="<?php echo $_SESSION['paidInfo']['user_email'] ?>"
></script>
</form>

<!---
<a id="cv" href="#">Download History</a>-->
</div>
<div id="noti">
<!---
          <li id="loan-history" class="list--">
            <a href="#"
              ><img src="API/server/users_avtar/ghs__04386.jpg" /><strong
                ><b id="u-name">You</b> Applied For 500$. Your Application
                Successfully Accepted By The Admin</strong
              ></a
            ><span id="time">23:2023</span>
          </li>
       ---->
</div>
</div>
</div>
<script>
function ghs__(tag) {
return document.querySelector(tag);
}

function Balance() {
fetch(
`http://localhost:8000/Bank/API/server/functions/application.php?getpayment=__ghs`
)
.then((res) => {
return res.json();
})
.then((data) => {
if (data.loan_amount) {
ghs__("#usd").textContent = data.loan_amount + "$";
console.log(data);
ghs__(".pay").style.display = "block";
ghs__("#user_id").value = data.user_id;
}
});
}
Balance();
function getApplication() {
fetch(
`http://localhost:8000/Bank/API/server/functions/application.php?getApplication=__ghs`
)
.then((res) => {
return res.json();
})
.then((data) => {
if (data) {
html = `
<li id="loan-history" class="list--"><a href="#"><img src="API/server/users_avtar/${data.user_avtar}" /><strong><b id="u-name">You</b> Applied For ${data.amount}. Your Application Successfully
Accepted By The Admin</strong></a><span id="time">${data.time}</span></li>
`;
ghs__("#noti").innerHTML = html;
}
});
}
getApplication();
</script>



<?php
include_once('footer.php');
?>
<script src="src/assets/js/index.js"></script>
</body>
</html>
<?php
}
?>