"use strict";

const stripe = Stripe(
  "pk_test_51NXj56ESRQ2Yx3Sgung6hAtrkftAOasrIedTUPFtrRpxosggSNvHp7puYWVrm212vux8KYzt4ZFnctvL7RT0g9b4004YEJ0Djh"
);
const btn = document.querySelector("#btn");
btn.addEventListener("click", (e) => {
  e.preventDefault();
  fetch('/checkout.php',{
    headers:{
    "Content-Type":'aplication/json',
    },
    method : "POST",
    body : JSON.stringify({})
  })
.then((res) => {
return res.json();
})
.then((data) => {
  console.log(data)
});
});
