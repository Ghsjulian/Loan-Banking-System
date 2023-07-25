function ghs__(tag) {
  return document.querySelector(tag);
}

function allText() {
  fetch(`http://localhost:8000/Bank/API/server/functions/notification.php?count=noti`)
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      ghs__("#budget").textContent = data;
    });
}
allText();
