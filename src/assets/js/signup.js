"use strict";
function __ghs(tag) {
  return document.querySelector(tag);
}
function ghs__(tag) {
  return document.querySelector(tag);
}

function SignUp() {
  var user_name = __ghs("#user_name").value;
  var user_email = __ghs("#user_email").value;
  var user_password = __ghs("#user_password").value;
  var phone_number = __ghs("#phone_number").value;
  var userIcon = __ghs("#preview");
  //alert(userIcon.src);
  /*
   *
   * Checking Valuess
   *
   */
  if (userIcon.src === "http://localhost:8000/Bank/__ghs__") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Please Upload Your Avtar";
  } else if (user_name == "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter User Name!";
  } else if (!check_email(user_email)) {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Invalid Email Address!";
  } else if (user_email == "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter  Your Email!";
  } else if (phone_number == "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your Phone!";
  } else if (phone_number == "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your Phone!";
  } else if (user_password == "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your Password!";
  } else {
    fetch("API/server/signup/index.php", {
      method: "POST",
      body: new FormData(__ghs("#SignupForm")),
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        if (data.status) {
          __ghs("#message").classList.add("success");
          __ghs("#message").style.display = "block";
          __ghs("#SignupForm").reset();
          __ghs("#message").textContent = data.message;
          window.location.href = "http://localhost:8000/bank/login";
        } else {
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

/*
 *
 *
 *    LOADING USER AFTAR
 *
 */

var loadFile = function (event) {
  var output = document.getElementById("preview");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
  };
  output.style.display = "block";
};

/*
 *
 *_______SELECT ALL PROJECTS ______
 *
 */
function LogIn() {
  var user_name = __ghs("#user_name").value;
  var user_password = __ghs("#user_password").value;
  /*
   *
   * Checking Valuess
   *
   */
  if (user_name === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter User Name!";
  } else if (user_password === "") {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Enter Your Password!";
  } else if (!check_value(user_name)) {
    __ghs("#message").classList.add("error");
    __ghs("#message").style.display = "block";
    __ghs("#message").textContent = "Bad String...";
  } else {
    fetch("API/server/login/index.php", {
      method: "POST",
      body: new FormData(__ghs("#LoginForm")),
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        //    console.log(data.user_role);
        if (data.status) {
          if (data.user_role === "Admin_ghs") {
            localStorage.setItem("user_role", data.user_role);
            localStorage.setItem("user_id", data.user_id);
            __ghs("#LoginForm").reset();
            __ghs("#message").classList.add("success");
            __ghs("#message").style.display = "block";
            __ghs("#message").textContent = data.message;
            window.location.href = "http://localhost:8000/bank/dashboard";
          } else {
            localStorage.setItem("user_id", data.user_id);
            __ghs("#LoginForm").reset();
            __ghs("#message").classList.add("success");
            __ghs("#message").style.display = "block";
            __ghs("#message").textContent = data.message;
            window.location.href = "http://localhost:8000/bank";
          }
        } else {
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

/*
 *
 * CHECK VALID INPUTS
 *
 */

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
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function Reset() {
  ghs__("#modal-box").style.display = "block";
}
function Close() {
  ghs__("#modal-box").style.display = "none";
}

function ChekNow() {
  var email = ghs__("#email").value;
  var password = ghs__("#password").value;
  if (email) {
    ghs__("#email").style.display = "none";
    var fdata = new FormData();
    fdata.append("check_email", "check_email");
    fdata.append("email", email);
    fetch("http://localhost:8000/Bank/API/server/login/auth.php", {
      method: "POST",
      body: fdata,
    })
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        //  console.log(data);
        if (data.status) {
          ghs__("#email").value = email;
          ghs__("#password").style.display = "block";
          if (password) {
            ResetPassword(password, email);
          }
        } else {
          ghs__("#message").classList.add("error");
          ghs__("#message").style.display = "block";
          ghs__("#message").textContent = data.message;
          ghs__("#email").style.display = "block";
          ghs__("#email").value = "";
          Close();
        }
      });
  } else {
    ghs__("#message").classList.add("error");
    ghs__("#message").style.display = "block";
    ghs__("#message").textContent = "Enter Your Email !";
  }
  setTimeout(() => {
    ghs__("#message").classList.remove("error")||ghs__("#message").classList.remove("success");
    ghs__("#message").textContent = "";
  }, 3000);
}

function ResetPassword(password, email) {
  var fdata = new FormData();
  fdata.append("reset_password", "reset");
  fdata.append("password", password);
  fdata.append("email", email);
  fetch("http://localhost:8000/Bank/API/server/login/auth.php", {
    method: "POST",
    body: fdata,
  })
    .then((res) => {
      return res.json();
    })
    .then((data) => {
      if (data.status) {
        ghs__("#message").classList.add("success");
        ghs__("#message").style.display = "block";
        ghs__("#message").textContent = data.message;
        ghs__("#email").value = "";
        ghs__("#password").value = "";
        Close();
      } else {
        ghs__("#message").classList.add("error");
        ghs__("#message").style.display = "block";
        ghs__("#message").textContent = data.message;
        ghs__("#email").value = "";
        ghs__("#password").value = "";
        Close();
      }
    });
}
