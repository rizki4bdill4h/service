 // Preloader
document.querySelector('.main').style.display = 'none';
document.getElementById('load').classList.add('loader');
//time out function
setTimeout(() => {
    document.getElementById('load').classList.remove('loader');
    document.querySelector('.main').style.display = 'block';
}, 500);
// ------akhir preloader
// gallery modal
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("gallery-item")) {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;
        const myModal = new bootstrap.Modal(document.getElementById('gallery-modal'));
        myModal.show();
    }
});
// ----akhir gallery modal 
// slide swiper
      var swiper = new Swiper(".mySwiper", {
            breakpoints: {
                320: {
                    slidesPerView: 2,
                },
                425: {
                    slidesPerView: 2,
                },
                991: {
                    slidesPerView: 3,
                },
                1240: {
                    slidesPerView: 5,
                },
                1600: {
                    slidesPerView: 6,
                }
            },
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        var swiper = new Swiper(".mySwiper-wriper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
// akhir slider swiper
//topscreen
var mybutton = document.getElementById("myBtn");
window.onscroll = function () {
    scrollFunction()
};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}