


 // add to favorite
function addFavorite() {
    document.querySelectorAll(".like-icon").forEach(button => {
        button.addEventListener("click", () => {
            const icon = button.querySelector("i");
            icon.classList.toggle("fa-regular");
            icon.classList.toggle("fa-solid");
            button.classList.toggle("liked");
        });
    });
}

// search movie icon
function SearchToggle() {
    const search = document.querySelector(".search_icon");
    const searchIcon = search.querySelector("i");
    const searchInput = document.querySelector(".search-box");

    search.addEventListener("click", () => {
        const isOpen = search.classList.contains("position-relative");
        search.classList.toggle("position-relative", !isOpen);
        searchIcon.className = isOpen ? "fa fa-search" : "fa fa-times";
        searchInput.style.display = isOpen ? "none" : "block";
        if (isOpen) searchInput.value = "";
    });
}

// profile image upload
function ProfileImageUpload() {
    const input = document.getElementById("file-profile-input");
    const profileImg = document.getElementById("form-profile");

    input.addEventListener("change", event => {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => profileImg.src = e.target.result;
        reader.readAsDataURL(file);
    });
}

// items profiles and save to local storage
function NavItemSwitch() {
    const items = document.querySelectorAll(".item");
    const forms = document.querySelectorAll(".form-content");

    const savedItemId = localStorage.getItem("selectedNavItem");
    if (savedItemId) {
        document.querySelector(`.item[data-target="${savedItemId}"]`)?.classList.add("active");
        document.getElementById(savedItemId)?.classList.remove("hidden-form");
    }

    items.forEach(item => {
        item.addEventListener("click", () => {
            items.forEach(i => i.classList.remove("active"));
            forms.forEach(f => f.classList.add("hidden-form"));

            item.classList.add("active");
            const targetId = item.getAttribute("data-target");
            document.getElementById(targetId)?.classList.remove("hidden-form");
            localStorage.setItem("selectedNavItem", targetId);
        });
    });
}

//  run functions
document.addEventListener("DOMContentLoaded", () => {
    addFavorite();
    SearchToggle();
    ProfileImageUpload();
    NavItemSwitch();
});

