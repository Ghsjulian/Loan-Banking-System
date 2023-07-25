function ghs__(tag) {
  return document.querySelector(tag);
}
function __ghs(tag) {
  return document.querySelector(tag);
}

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
      ghs__(".logo").textContent = data.logo_text;
      ghs__(".hero-top").textContent = data.hero_text;
      ghs__(".hero-bottom").textContent = data.hero_bottom;
    });
}
WebInfo()