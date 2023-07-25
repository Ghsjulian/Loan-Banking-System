<?php
session_start();
$session = $_SESSION['u_info'];
$admin = $session['user_role'];
$user_id = $session['id'];
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
<div id="noti"></div>
</div>
</div>



<?php
include_once('footer.php');
?>
<script>
function ghs__(tag) {
return document.querySelector(tag);
}
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
} else {
ghs__("#noti").innerHTML = `
<h3>You Don't Have Any Loan</h3>
`;
}
});
}
getApplication();
function __date__() {
var d = new Date();
var months = [
"January",
"February",
"March",
"April",
"May",
"June",
"July",
"August",
"September",
"October",
"November",
"December",
];
var currentMonth = months[d.getMonth()];
return (
d.getDate() +
" " +
currentMonth +
" " +
d.getHours() +
":" +
d.getMinutes()
);
}
ghs__("#time").textContent = __date__();
</script>
<script src="src/assets/js/index.js"></script>
</body>
</html>
<?php
}
?>