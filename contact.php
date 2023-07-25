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
<link rel="stylesheet" href="src/assets/css/App.css" />
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
<h2>Contact Us</h2>
<p id="txt">
You can always and anytime contact with me . Here I've dropped my
contact details so that you can able contact with me . You can
also find me on social medias . After contacting with me you'll
know more about myself . Thank You !
</p>
<div class="contact-form">
<input
type="text"
placeholder="Enter Name"
id="name"
name="name"
/>
<input
type="email"
placeholder="Enter Email"
id="email"
name="email"
/>
<textarea
type="text"
placeholder="Write Message"
id="message"
name="message"
></textarea>
<button type="button" id="btn" name="contact-btn">
Contact
</button>
</div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
<script>
function WebInfo() {
const edit = "FetchWeb";
fetch(
`http://localhost:8000/Bank/API/server/functions/customize.php?fetch_web=${edit}`
)
.then((res) => {
return res.json();
})
.then((data) => {
console.log(data);
ghs__("#txt").textContent = data.contact_text;
});
}
WebInfo()
</script>
<script src="src/assets/js/index.js"></script>
</body>
</html>