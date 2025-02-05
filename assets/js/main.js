document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initSwipers();
    initVideoPlayer();
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
    const commonConfig = {
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

    const cardSwiperConfig = {
        ...commonConfig,
        slidesPerView: 1,
        spaceBetween: 30,
    };

    const genreSwiperConfig = {
        ...commonConfig,
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            ...commonConfig.navigation,
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    };

    if (document.querySelector('.newMoviesSwiper')) {
        new Swiper('.newMoviesSwiper', cardSwiperConfig);
    }
    if (document.querySelector('.newShowsSwiper')) {
        new Swiper('.newShowsSwiper', cardSwiperConfig);
    }
    if (document.querySelector('.trendingSwiper')) {
        new Swiper('.trendingSwiper', cardSwiperConfig);
    }
    if (document.querySelector('.genreSwiper')) {
        new Swiper('.genreSwiper', genreSwiperConfig);
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