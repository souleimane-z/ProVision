<section class="genres sectionsMain">
    <div class="subscribeHome-text sectionsMain_txt">
        <h3>Explorer par genre</h3>
    </div>

    <div class="carousel-section">
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach (array_chunk($genreShows, 4, true) as $genreGroup): ?>
                    <div class="swiper-slide">
                        <div class="genre-grid">
                            <?php foreach ($genreGroup as $category => $shows): ?>
                                <div class="card">
                                    <div class="card-img">
                                        <div class="card-img_row">
                                            <?php if (!empty($shows[0]) && isset($shows[0]['poster_path'])): ?>
                                                <a href="<?= BASE_URL ?>pages/moviesShows/showDetails.php?id=<?= $shows[0]['id'] ?>">
                                                    <img src="<?= TMDB_IMAGE_BASE_URL . $shows[0]['poster_path'] ?>"
                                                         alt="<?= $shows[0]['name'] ?>"
                                                         title="<?= $shows[0]['name'] ?>">
                                                </a>
                                            <?php else: ?>
                                                <div class="placeholder-poster"></div>
                                            <?php endif; ?>

                                            <?php if (!empty($shows[1]) && isset($shows[1]['poster_path'])): ?>
                                                <a href="<?= BASE_URL ?>pages/moviesShows/showDetails.php?id=<?= $shows[1]['id'] ?>">
                                                    <img src="<?= TMDB_IMAGE_BASE_URL . $shows[1]['poster_path'] ?>"
                                                         alt="<?= $shows[1]['name'] ?>"
                                                         title="<?= $shows[1]['name'] ?>">
                                                </a>
                                            <?php else: ?>
                                                <div class="placeholder-poster"></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-img_row second-row">
                                            <?php if (!empty($shows[2]) && isset($shows[2]['poster_path'])): ?>
                                                <a href="<?= BASE_URL ?>pages/moviesShows/showDetails.php?id=<?= $shows[2]['id'] ?>">
                                                    <img src="<?= TMDB_IMAGE_BASE_URL . $shows[2]['poster_path'] ?>"
                                                         alt="<?= $shows[2]['name'] ?>"
                                                         title="<?= $shows[2]['name'] ?>">
                                                </a>
                                            <?php else: ?>
                                                <div class="placeholder-poster"></div>
                                            <?php endif; ?>

                                            <?php if (!empty($shows[3]) && isset($shows[3]['poster_path'])): ?>
                                                <a href="<?= BASE_URL ?>pages/moviesShows/showDetails.php?id=<?= $shows[3]['id'] ?>">
                                                    <img src="<?= TMDB_IMAGE_BASE_URL . $shows[3]['poster_path'] ?>"
                                                         alt="<?= $shows[3]['name'] ?>"
                                                         title="<?= $shows[3]['name'] ?>">
                                                </a>
                                            <?php else: ?>
                                                <div class="placeholder-poster"></div>
                                            <?php endif; ?>
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