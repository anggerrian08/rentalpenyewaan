let searchBtn = document.querySelector('#search-btn');
let searchBar = document.querySelector('.search-bar-container');
let formBtn = document.querySelector('#login-btn');
let loginForm = document.querySelector('.login-form-container');
let formClose = document.querySelector('#form-close'); /*untuk close pada bagian login*/
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videoBtn = document.querySelectorAll('.vid-btn'); /*control pada videobtn agar tombol bisa berfungi*/

/*untuk bagian scroll bagian kanan*/
window.onscroll = () =>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times'); 
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

/*menu pada bagian mengecil garis tiga*/
menu.addEventListener('click', () =>{
    menu.classList.toggle('fa-times'); /*supaya muncul tanda close*/
    navbar.classList.toggle('active');
});


/*supaya jadi tombol x pada bagian tombol cari*/
searchBtn.addEventListener('click', () =>{
    searchBtn.classList.toggle('fa-times');
    searchBar.classList.toggle('active');
});

formBtn.addEventListener('click', () =>{
    loginForm.classList.add('active');
});

formClose.addEventListener('click', () =>{
    loginForm.classList.remove('active');
});

videoBtn.forEach(btn =>{
    btn.addEventListener('click', ()=>{
        document.querySelector('.controls .active').classList.remove('active'); /*document.queryselector ini berfungsi agar apabila ditb titik putih itu akan berubah menjadi warna orange*/
        btn.classList.add('active'); /*agar bisa dipencet tombol orangenya jadi saya tambahkan add*/
        let src = btn.getAttribute('data-src');
        document.querySelector('#video-slider').src = src;
    })
});

var swiper = new Swiper(".review-slider",{ /*slider bagian review*/
    spaceBetween: 20,
    loop:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
breakpoints: {
    640: {
        slidesPerView: 1, /* hanya 1 sd 3 karena disisakan 1 supaya slidenya terlihat bagus dan natural*/
    },
    768: {
        slidesPerView: 2,
    },
    1024: {
        slidesPerView: 3,
    },
},
});

var swiper = new Swiper(".brand-slider",{ /*slider bagian brand*/
    spaceBetween: 20,
    loop:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
breakpoints: {
    450: {
        slidesPerView: 2, /* hanya dari 2 sd 5, karena disisakan 1 supaya slidenya terlihat bagus dan natural*/
    },
    768: {
        slidesPerView: 3,
    },
    991: {
        slidesPerView: 4,
    },
    1200: {
        slidesPerView: 5,
    },
},
});

/*pop up gallery*/
function openPopup(imgSrc) {
    let popup = document.getElementById('myPopup'); /*nama id dari popup*/
    let popupImg = document.getElementById('popupImg'); /*pengaturan pop up image */

    popup.style.display = 'block';
    popupImg.src = imgSrc;
}

function closePopup() {
    document.getElementById('myPopup').style.display = 'none';
}

/*
// Get loader container element
var loaderContainer = document.getElementById('loaderContainer');

// Show loader when the page starts loading
window.addEventListener('load', function () {
    loaderContainer.style.display = 'flex';
    // Simulate a delay (you can remove this in your actual implementation)
    setTimeout(function () {
        // Hide loader after a delay (simulating content loading)
        loaderContainer.style.display = 'none';
    }, 2000);
});*/