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

function initVideoPlayer() {
    const playButton = document.querySelector('.play-button');
    const videoModal = document.querySelector('.video-modal');
    const closeButton = document.querySelector('.close-video');
    const videoPlayer = document.querySelector('.video-player');

    if (playButton && videoModal) {
        playButton.addEventListener('click', () => {
            videoModal.classList.add('active');
            videoPlayer.play();
        });

        closeButton.addEventListener('click', () => {
            videoModal.classList.remove('active');
            videoPlayer.pause();
            videoPlayer.currentTime = 0;
        });

        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) {
                videoModal.classList.remove('active');
                videoPlayer.pause();
                videoPlayer.currentTime = 0;
            }
        });
    }
}

// Ajouter à la fonction existante initNavigation
document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initSwipers();
    initVideoPlayer();
});