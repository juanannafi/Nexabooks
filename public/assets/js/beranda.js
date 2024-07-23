const toggler = document.querySelector(".btn");

toggler.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
}); 

$(document).ready(function() {
    $('#carousel').carousel({
        interval: 2000 // Ganti dengan interval (dalam milidetik) antara geseran
    });
});