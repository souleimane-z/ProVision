<section class="newAddition sectionsMain">
    <div class="subscribeHome-text sectionsMain_txt">
        <h3>Nouveautés</h3>
    </div>

    <div class="carousel-section">
        <div class="swiper newMoviesSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($newMovies as $group): ?>
                    <div class="swiper-slide">
                        <div class="carousel-grid">
                            <?php foreach ($group as $movie): ?>
                                <?php renderMovieCard($movie); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>