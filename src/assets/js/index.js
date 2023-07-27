function ghs__(tag) {
  return document.querySelector(tag);
}
function __ghs(tag) {
  return document.querySelector(tag);
}
function OpenMenu() {
  var menu = ghs__("#mobile-menu").getAttribute("data");
  if (menu == "1") {
    ghs__("#menu").style.display = "none";
    //ghs__("#menu").classList.add("mobileMenu");
    ghs__("#mobile-menu").setAttribute("data", "0");
  } else {
    ghs__("#menu").style.display = "block";
    // ghs__("#menu").classList.remove("mobileMenu");
    ghs__("#mobile-menu").setAttribute("data", "1");
  }
}

function Developer() {
  var img = ghs__("#developer");
  var dev = ghs__("#dev");
  var devInfo = [
    "Web Developer",
    "Web Designer",
    "PHP Developer",
    "SEO Specialist",
    "Full-Stack Devoloper",
    "Blogger & Writer",
    "Content Writer",
    "Back-End Developer",
  ];
  var images = ["__ghs__.png", "ghs.jpg", "ghs_logo.png", "green_logo.png"];
  var devIndex = Math.floor(Math.random() * devInfo.length);
  var randomIndex = Math.floor(Math.random() * images.length);
  dev.textContent = devInfo[devIndex];
  img.src = `assets/img/${images[randomIndex]}`;
}
/*
setInterval(() => {
  Developer();
}, 3000);
*/

function Edit(edit) {
  ghs__("#edit-box").style.display = "block";
  const txt = "Something else";
  ghs__("#edit_box").value = txt;
  fetch(
    `http://localhost:8000/Bank/API/server/functions/customize.php?edit_name=${edit}`
  )
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      console.log(data);
      ghs__("#edit_box").value = data;
      ghs__("#hidden_data").value = edit;
    });
}
function UpdatPage() {
  const col_name = ghs__("#hidden_data").value;
  const text = ghs__("#edit_box").value;
  var form_data = new FormData();
  form_data.append("data", text);
  form_data.append("col_name", col_name);
  if (text) {
    fetch(`http://localhost:8000/Bank/API/server/functions/customize.php`, {
      method: "POST",
      body: form_data,
    })
      .then((res) => {
        return res.text();
      })
      .then((data) => {
        //     console.log(data);
        CloseEdit();
      });
  } else {
    alert("Please Write Something");
  }
}

function CloseEdit() {
  ghs__("#edit-box").style.display = "none";
}

//console.log(localStorage.getItem("user_role"));

function Apply() {
  var select = ghs__("#select_bank");
  var Selectvalue = select.value;
  var bank = select.options[select.selectedIndex].text;
  var user_name = __ghs("#name").value;
  var user_email = __ghs("#email").value;
  var amount = __ghs("#amount").value;
  var bank_number = __ghs("#bank_number").value;

  var phone_number = __ghs("#phone_number").value;
  var bvn_number = __ghs("#bvn_number").value;
  var nin_number = __ghs("#nin_number").value;
  var zip_code = __ghs("#zip_code").value;
  var home_address = __ghs("#home_address").value;
  var city = __ghs("#city").value;
  var state = __ghs("#state").value;
  /*
   *
   * Checking Valuess
   *
   */
  if (bank === "Chose A Bank") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Select a bank please!";
  } else if (user_name === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter User Name!";
  } else if (!check_value(user_name)) {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Invalid User Name!";
  } else if (user_email === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter User Email!";
  } else if (!check_email(user_email)) {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Invalid User Email!";
  } else if (amount === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Amount Please";
  } else if (bank_number === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Bank Number Please";
  } else if (phone_number === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Phone Number Please";
  } else if (bvn_number === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter BVN Number Please";
  } else if (nin_number === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter NIN Number Please";
  } else if (zip_code === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter ZIP/Post Code Please";
  } else if (home_address === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Home Address Please";
  } else if (city === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your City Please";
  } else if (state === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your State Please";
  } else {
    var formData = new FormData(__ghs("#application_form"));
    formData.append("bank_name", bank);
    formData.append("time", __date__());
    fetch("API/server/functions/application.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        //   alert(data);
        if (data.status) {
          __ghs("#message").classList.add("success");
          __ghs("#message").style.display = "block";
          __ghs("#application_form").reset();
          __ghs("#message").textContent = data.message;
          window.location.href = "http://localhost:8000/Bank/loan-history";
        } else {
          __ghs("#application_form").reset();
          __ghs("#message").classList.add("error");
          __ghs("#message").style.display = "block";
          __ghs("#message").textContent = data.message;
        }
      });
  }
  setTimeout(() => {
    __ghs("#message").classList.remove("error");
    __ghs("#message").textContent = "";
  }, 3000);
}
function check_value(value) {
  if (value.includes("*")) {
    return false;
  } else if (value.includes("/")) {
    return false;
  } else if (value.includes("'")) {
    return false;
  } else if (value.includes(":")) {
    return false;
  } else if (value.includes("!")) {
    return false;
  } else if (value.includes("?")) {
    return false;
  } else if (value.includes("&")) {
    return false;
  } else if (value.includes("<")) {
    return false;
  } else if (value.includes(">")) {
    return false;
  } else if (value.includes("=")) {
    return false;
  } else {
    return true;
  }
}

function check_email(value) {
  if (value.includes("@yahoo.com")) {
    return true;
  } else if (value.includes("@gmail.com")) {
    return true;
  } else if (value.includes("@outlook.com")) {
    return true;
  } else if (value.includes("@yandex.com")) {
    return true;
  } else {
    return false;
  }
}
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
    d.getDate() + " " + currentMonth + " " + d.getHours() + ":" + d.getMinutes()
  );
}

function Contact() {
  var fdata = new FormData(ghs__("#contact-form"));
  var subject = ghs__("#subject").value;
  var email = ghs__("#email").value;
  var msg = ghs__("#msg").value;
  fdata.append("action", "Contact");
  if (email === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter User Email!";
  } else if (!check_email(email)) {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Invalid User Email!";
  } else if (subject === "") {
    __ghs("#msg").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Write Your Subject";
  } else if (msg === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Please Write Your Message";
  } else {
    fetch(`http://ghs.rf.gd/Bank/API/server/functions/email.php`, {
      method: "POST",
      body: fdata,
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        if (data.status) {
          __ghs("#message").classList.add("success");
          __ghs("#message").style.display = "block";
          __ghs("#contact-form").reset();
          __ghs("#message").textContent = data.message;
        } else {
          __ghs("#message").classList.add("error");
          __ghs("#message").style.display = "block";
          __ghs("#message").textContent = data.message;
        }
      });
    setTimeout(() => {
      __ghs("#message").classList.remove("error") ||
        __ghs("#message").classList.remove("success");
      __ghs("#message").textContent = "";
    }, 3000);
  }
}
