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
<div id="view_application" class="col">
<h2>View Applicants Details</h2>
<img src="API/server/users_avtar/<?php echo $_GET['u_avtar'] ?>" />
<div class="view">
<!-----
          <img src="src/assets/img/card.jpg" />
          <li>
            <span id="indexName">Applicants Name </span> <b>:</b
            ><span id="indexValue">Ghs Julian</span>
          </li>
          <li>
            <span id="indexName">Applicants Email</span> <b>:</b
            ><span id="indexValue">Ghs Julian</span>
          </li>
          <li>
            <span id="indexName">Phone Number</span> <b>:</b
            ><span id="indexValue">Ghs Julian</span>
          </li>
           ---->
</div>
<p id="info">
Remember !!! You can transfer money practically , once you have
transfered the loan to the applicants Account ! Came back here again
and If you've payed ! just claim it that you've payed the applicants
account ! It'll be notify in the applicants account.
</p>
<div class="button-area">
Did you pay ?
<button type="button" id="btn_accept" name="contact-btn">
Yes! Confirm
</button>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
<script>
function ghs__(tag) {
return document.querySelector(tag);
}
function getApplication(u_id) {
fetch(
`http://localhost:8000/Bank/API/server/functions/application.php?view_application=${u_id}`
)
.then((res) => {
return res.json();
})
.then((data) => {
var html = `
<li>
<span id="indexName">Applicants Name </span> <b>:</b><span id="indexValue">${data.user_name}</span>
</li>

<li>
<span id="indexName">Applicants Email</span> <b>:</b><span id="indexValue">${data.user_email}</span>
</li>

<li>
<span id="indexName">Phone Number</span> <b>:</b><span id="indexValue">${data.phone_number}</span>
</li>



<li>
<span id="indexName">Loan Amount</span> <b>:</b><span id="indexValue">${data.loan_amount}</span>
</li>



<li>
<span id="indexName">Bank Name</span> <b>:</b><span id="indexValue">${data.bank_name}</span>
</li>



<li>
<span id="indexName">Account Number</span> <b>:</b><span id="indexValue">${data.account_number}</span>
</li>



<li>
<span id="indexName">BVN Number</span> <b>:</b><span id="indexValue">${data.bvn_number}</span>
</li>



<li>
<span id="indexName">NIN Number</span> <b>:</b><span id="indexValue">${data.nin_number}</span>
</li>



<li>
<span id="indexName">Applicants ZIP/Post Code</span> <b>:</b><span id="indexValue">${data.zip_code}</span>
</li>



<li>
<span id="indexName">Applicants State</span> <b>:</b><span id="indexValue">${data.state}</span>
</li>



<li>
<span id="indexName">Applicants City/Town</span> <b>:</b><span id="indexValue">${data.city}</span>
</li>



<li>
<span id="indexName">Applicants User ID</span> <b>:</b><span id="indexValue">${data.user_id}</span>
</li>

`;
ghs__(".view").innerHTML = html;
console.log(data);
});
}
getApplication(<?php echo $_GET['user_id'] ?>);
</script>
<script src="src/assets/js/index.js"></script>
</body>
</html>
<?php
}
?>