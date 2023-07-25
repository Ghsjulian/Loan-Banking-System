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
<div class="col">
<h2 class="head">Our Services</h2>
<p id="intro">
Our school management system is provide good lesson . We teach
pretty good to our students . Our aim is that our students learn
well . They can achieve their dreams .
</p>
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
ghs__("#intro").textContent = data.service_text;
});
}
WebInfo()
</script>
<script src="src/assets/js/index.js"></script>
</body>
</html>