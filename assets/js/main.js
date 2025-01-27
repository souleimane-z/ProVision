document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initSwipers();
});

function initNavigation() {
    const navToggle = document.querySelector('.nav-toggle');
    if (navToggle) {
        navToggle.addEventListener('click', () => {
            document.querySelector('.header-list').classList.toggle('active');
        });
    }
}

function initSwipers() {
    const swiperConfig = {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        speed: 800
    };

    if (document.querySelector('.newMoviesSwiper')) {
        new Swiper('.newMoviesSwiper', swiperConfig);
    }
    if (document.querySelector('.newShowsSwiper')) {
        new Swiper('.newShowsSwiper', swiperConfig);
    }
    if (document.querySelector('.trendingSwiper')) {
        new Swiper('.trendingSwiper', swiperConfig);
    }

    if (document.querySelector('.genreSwiper')) {
        new Swiper('.genreSwiper', swiperConfig);
    }
}