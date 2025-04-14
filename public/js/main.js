/******/ (() => { // webpackBootstrap
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
// add to favorite
function addFavorite() {
  document.querySelectorAll(".like-icon").forEach(function (button) {
    button.addEventListener("click", function () {
      var icon = button.querySelector("i");
      icon.classList.toggle("fa-regular");
      icon.classList.toggle("fa-solid");
      button.classList.toggle("liked");
    });
  });
}

// search movie icon
function SearchToggle() {
  var search = document.querySelector(".search_icon");
  var searchIcon = search.querySelector("i");
  var searchInput = document.querySelector(".search-box");
  search.addEventListener("click", function () {
    var isOpen = search.classList.contains("position-relative");
    search.classList.toggle("position-relative", !isOpen);
    searchIcon.className = isOpen ? "fa fa-search" : "fa fa-times";
    searchInput.style.display = isOpen ? "none" : "block";
    if (isOpen) searchInput.value = "";
  });
}

// profile image upload
function ProfileImageUpload() {
  var input = document.getElementById("file-profile-input");
  var profileImg = document.getElementById("form-profile");
  input.addEventListener("change", function (event) {
    var file = event.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function (e) {
      return profileImg.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
}

// items profiles and save to local storage
function NavItemSwitch() {
  var items = document.querySelectorAll(".item");
  var forms = document.querySelectorAll(".form-content");
  var savedItemId = localStorage.getItem("selectedNavItem");
  if (savedItemId) {
    var _document$querySelect, _document$getElementB;
    (_document$querySelect = document.querySelector(".item[data-target=\"".concat(savedItemId, "\"]"))) === null || _document$querySelect === void 0 || _document$querySelect.classList.add("active");
    (_document$getElementB = document.getElementById(savedItemId)) === null || _document$getElementB === void 0 || _document$getElementB.classList.remove("hidden-form");
  }
  items.forEach(function (item) {
    item.addEventListener("click", function () {
      var _document$getElementB2;
      items.forEach(function (i) {
        return i.classList.remove("active");
      });
      forms.forEach(function (f) {
        return f.classList.add("hidden-form");
      });
      item.classList.add("active");
      var targetId = item.getAttribute("data-target");
      (_document$getElementB2 = document.getElementById(targetId)) === null || _document$getElementB2 === void 0 || _document$getElementB2.classList.remove("hidden-form");
      localStorage.setItem("selectedNavItem", targetId);
    });
  });
}

//  run functions
document.addEventListener("DOMContentLoaded", function () {
  addFavorite();
  SearchToggle();
  ProfileImageUpload();
  NavItemSwitch();
});
/******/ })()
;