
document.querySelectorAll(".like-icon").forEach(button => {
    button.addEventListener("click", function () {
        let icon = this.querySelector("i");

        icon.classList.toggle("fa-regular");
        icon.classList.toggle("fa-solid");
        this.classList.toggle("liked");
    });
});



document.getElementById("fileInput").addEventListener("change", function (event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("profilePic").src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
    },
    breakpoints: {
        1200: {
            slidesPerView: 4
        },
        992: {
            slidesPerView: 3
        },
        768: {
            slidesPerView: 2
        },
        576: {
            slidesPerView: 1
        }
    }
});
var search = document.querySelector(".search_icon");
var search_icon = document.querySelector('.search_icon i');
var input_search = document.querySelector('.search-box');
search.addEventListener('click', function () {
    var isOpen = search.classList.contains('position-relative');
    if (!isOpen) {
        search.classList.add('position-relative');
        search_icon.classList = 'fa fa-times';
        input_search.style.display = 'block';
        input_search.style.transition = '0.2s ease';
        input_search.classList.add('position-absolute');
        input_search.style.top = '1.8rem';
        input_search.style.left = '2.5rem';
        input_search.style.zIndex = 1;
    } else {
        search.classList.remove('position-relative');
        search_icon.classList = 'fa fa-search';
        input_search.style.display = 'none';
        input_search.classList.remove('position-absolute');
        input_search.value = '';
    }
});

