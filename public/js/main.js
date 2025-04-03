 // add to favorite

document.querySelectorAll(".like-icon").forEach(button => {
        button.addEventListener("click", function () {
            let icon = this.querySelector("i");

            icon.classList.toggle("fa-regular");
            icon.classList.toggle("fa-solid");
            this.classList.toggle("liked");
        });
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

  }

  else {
    search_icon.classList = 'fa fa-search';
    input_search.style.display = 'none';

    input_search.value = '';
  }
});






 let input = document.getElementById("file-profile-input");
 input.addEventListener("change", function (event) {
     var file = event.target.files[0];
     if (file) {
         var reader = new FileReader();
         reader.onload = function (e) {
             document.getElementById("form-profile").src = e.target.result;
         };
         reader.readAsDataURL(file);
     }
 });


 // change item

 document.addEventListener('DOMContentLoaded', function () {

     const savedItem = localStorage.getItem('selectedNavItem');

     if (savedItem) {

         const selectedItem = document.querySelector(`.item[data-target="${savedItem}"]`);
         if (selectedItem) {
             selectedItem.classList.add('active');
         }


         const targetForm = document.getElementById(savedItem);
         if (targetForm) {
             targetForm.classList.remove('hidden-form');
         }
     }

     document.querySelectorAll('.item').forEach(item => {
         item.addEventListener('click', function () {
             document.querySelectorAll('.item').forEach(i => i.classList.remove('active'));

             this.classList.add('active');

             document.querySelectorAll('.form-content').forEach(form => form.classList.add('hidden-form'));

             const targetForm = document.getElementById(this.getAttribute('data-target'));
             if (targetForm) {
                 targetForm.classList.remove('hidden-form');
                 localStorage.setItem('selectedNavItem', this.getAttribute('data-target'));
             }
         });
     });
 });
