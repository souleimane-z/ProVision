<section class="genres sectionsMain">
    <div class="subscribeHome-text sectionsMain_txt">
        <h3>Explorer par genre</h3>
    </div>

    <div class="carousel-section">
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach (array_chunk($genreMovies, 4, true) as $genreGroup): ?>
                    <div class="swiper-slide">
                        <div class="genre-grid">
                            <?php foreach ($genreGroup as $category => $movies): ?>
                                <div class="card">
                                    <div class="card-img">
                                        <div class="card-img_row">
                                            <img src="<?= TMDB_IMAGE_BASE_URL . $movies[0]['poster_path'] ?>"
                                                 alt="<?= $movies[0]['title'] ?>"
                                                 title="<?= $movies[0]['title'] ?>">
                                            <img src="<?= TMDB_IMAGE_BASE_URL . $movies[1]['poster_path'] ?>"
                                                 alt="<?= $movies[1]['title'] ?>"
                                                 title="<?= $movies[1]['title'] ?>">
                                        </div>
                                        <div class="card-img_row second-row">
                                            <img src="<?= TMDB_IMAGE_BASE_URL . $movies[2]['poster_path'] ?>"
                                                 alt="<?= $movies[2]['title'] ?>"
                                                 title="<?= $movies[2]['title'] ?>">
                                            <img src="<?= TMDB_IMAGE_BASE_URL . $movies[3]['poster_path'] ?>"
                                                 alt="<?= $movies[3]['title'] ?>"
                                                 title="<?= $movies[3]['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="card-explore">
                                        <h6><?= $category ?></h6>
                                        <button><i class="fa-solid fa-chevron-right"></i></button>
                                    </div>
                                </div>
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