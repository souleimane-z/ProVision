<section class="trendingNow sectionsMain">
    <div class="subscribeHome-text sectionsMain_txt">
        <h3>Tendances</h3>
    </div>

    <div class="carousel-section">
        <div class="swiper trendingSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($trendingShows as $group): ?>
                    <div class="swiper-slide">
                        <div class="carousel-grid">
                            <?php foreach ($group as $show): ?>
                                <?php renderShowCard($show); ?>
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