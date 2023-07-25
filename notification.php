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
<div class="column">
<h2>Latest Notifications</h2>
<div id="noti"></div>
<!--
       <li class="list--">
          <a href="#">
            <img src="src/assets/img/authorimage3.jpg" />
            <strong
              ><b id="u-name">Ghs Julian</b> Applied For Getting Loan.</strong
            >
          </a>
        </li>
        <li class="list--">
          <a href="#">
            <img src="src/assets/img/authorimage2.jpg" />
            <strong
              ><b id="u-name">Smita Smith</b> Applied For Getting Loan.</strong
            >
          </a>
        </li>
        <li class="list--">
          <a href="#">
            <img src="src/assets/img/authorimage2.jpg" />
            <strong
              ><b id="u-name">Sweta Sharma</b> Applied For Getting Loan.</strong
            >
          </a>
        </li>
        <li class="list--">
          <a href="#">
            <img src="src/assets/img/authorimage4.jpg" />
            <strong
              ><b id="u-name">Alie Smith</b> Applied For Getting Loan.</strong
            >
          </a>
        </li>
        --->
</div>
</div>

<?php
include_once('footer.php');
?>
<script>
function ghs__(tag) {
return document.querySelector(tag);
}

function FetchText() {
fetch(
`http://localhost:8000/Bank/API/server/functions/notification.php?fetch=ghs`
)
.then((res) => {
return res.json();
})
.then((data) => {
if (data.length > 0) {
for (let i = 0; i < data.length; i++) {
//        console.log(data);
var html = `<li class="list--"><a href="http://localhost:8000/Bank/view?user_id=${data[i].user_id}&u_avtar=${data[i].user_avtar}"><img
src="http://localhost:8000/Bank/API/server/users_avtar/${data[i].user_avtar}" /><strong><b id="u-name">${data[i].user_name}</b> ${data[i].notification}</strong></a></li>`;
ghs__("#noti").innerHTML += html;
}
}
});
}
FetchText();
</script>
<script src="src/assets/js/notification.js"></script>
<script src="src/assets/js/index.js"></script>
</body>
</html>
<?php
}
?>