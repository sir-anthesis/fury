// parallax wave
$(window).scroll(function () {
  var wScroll = $(this).scrollTop();
  var home = $(".home").offset().top;
  var backgroundImage = $(".home");

  if (wScroll > home) {
    $(".wave1").css({
      transform: "translate(0px, " + wScroll / 25 + "%)",
    });

    $(".wave2").css({
      transform: "translate(0px, " + wScroll / 15 + "%)",
    });

    $(".wave3").css({
      transform: "translate(0px, " + wScroll / 10 + "%)",
    });

    backgroundImage.css({
      "background-position": "0 " + wScroll / 15 + "%",
    });
  }
});

const homeButton = document.querySelector(".home-button");
const imgHome = document.querySelector(".img-home");

const lEasy = document.querySelector(".l-easy");
const lMedium = document.querySelector(".l-medium");
const lHard = document.querySelector(".l-hard");

function changeLeaderboard() {
  if (homeButton.innerText == "easy") {
    lEasy.style.display = "flex";
    lMedium.style.display = "none";
    lHard.style.display = "none";
  } else if (homeButton.innerText == "medium") {
    lEasy.style.display = "none";
    lMedium.style.display = "flex";
    lHard.style.display = "none";
  } else if (homeButton.innerText == "hard") {
    lEasy.style.display = "none";
    lMedium.style.display = "none";
    lHard.style.display = "flex";
  }
}

changeLeaderboard();

// button mode + gambar bulat
let difficultyIndex = 1;

const difficulties = ["hard", "medium", "easy"];
const images = ["ship.gif", "ship.gif", "ship.gif"];

function changeDifficulty(direction) {
  if (direction === "left") {
    difficultyIndex =
      (difficultyIndex - 1 + difficulties.length) % difficulties.length;
  } else if (direction === "right") {
    difficultyIndex = (difficultyIndex + 1) % difficulties.length;
  }

  homeButton.innerText = difficulties[difficultyIndex];
  imgHome.src = "asset/" + images[difficultyIndex];

  changeLeaderboard();
}

// div profile
function toggleEdit() {
  // Mengubah tag i menjadi <button>
  const editButton = document.querySelector(".edit-button");
  const buttonElement = document.createElement("button");

  const ppElement = document.querySelector(".pp-input");
  ppElement.style.visibility = "visible";

  buttonElement.className = "profile-button edit-button";
  buttonElement.innerHTML = "<p>Save</p>";
  buttonElement.setAttribute("type", "submit");
  buttonElement.setAttribute("name", "update");
  // buttonElement.setAttribute("onclick", "saveChanges()");

  editButton.parentNode.replaceChild(buttonElement, editButton);

  // Mengubah tag div menjadi <form>
  const profileContainer = document.querySelector(".profile-container");
  const formElement = document.createElement("form");
  formElement.className = "profile-container profile-content-show";
  formElement.setAttribute("action", "controller/controller.php");
  formElement.setAttribute("method", "POST");
  formElement.setAttribute("enctype", "multipart/form-data");
  // formElement.addEventListener("submit"); // Tambahkan event listener untuk pengiriman formulir

  // Salin konten dari kontainer profil yang sudah ada
  formElement.innerHTML = profileContainer.innerHTML;

  // Gantikan kontainer profil yang sudah ada dengan elemen formulir baru
  profileContainer.parentNode.replaceChild(formElement, profileContainer);

  const inputs = document.querySelectorAll(".form-input");
  inputs.forEach((input) => {
    input.removeAttribute("readonly");
  });

  document.querySelector(".cancel-button").style.display = "flex";
}

function cancelEdit() {
  const editButton = document.querySelector(".edit-button");
  const buttonElement = document.createElement("i");
  buttonElement.className = "profile-button edit-button";
  buttonElement.innerHTML = "<p>Edit</p>";
  buttonElement.setAttribute("onclick", "toggleEdit()");

  const ppElement = document.querySelector(".pp-input");
  ppElement.style.visibility = "hidden";

  editButton.parentNode.replaceChild(buttonElement, editButton);

  const inputs = document.querySelectorAll(".form-input");
  inputs.forEach((input) => {
    input.setAttribute("readonly", true);
  });

  // Mengubah tag form menjadi div
  const profileContainer = document.querySelector(".profile-container");
  const divElement = document.createElement("div");
  divElement.className = "profile-container profile-content-show";
  divElement.innerHTML = profileContainer.innerHTML;

  profileContainer.parentNode.replaceChild(divElement, profileContainer);

  document.querySelector(".cancel-button").style.display = "none";
}

function redirectToPlay(button) {
  var difficulty = button.innerHTML.trim();
  var url = "controller/controller.php?play&" + encodeURIComponent(difficulty);
  window.location.href = url;
}

// buka tutup div profile
function toggleProfileContainer() {
  const profileContainer = document.querySelector(".profile-container");
  profileContainer.classList.add("profile-content-show");
}

function closeProfileContainer() {
  const profileContainer = document.querySelector(".profile-container");
  profileContainer.classList.remove("profile-content-show");
}
