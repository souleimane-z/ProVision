<?php
function renderMovieCard($movie) {
    if (!$movie) return;
    ?>
    <div class="moviesCard">
        <div class="movies-img">
            <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>"
                 alt="<?= $movie['title'] ?>"
                 title="<?= $movie['title'] ?>"
                 loading="lazy">
        </div>
        <div class="moviesCardDetails">
            <span><i class="fa-solid fa-star"></i><?= number_format($movie['vote_average'], 1) ?></span>
            <span><i class="fa-solid fa-clock"></i><?= floor($movie['runtime']/60).'h'.($movie['runtime']%60) ?></span>
        </div>
    </div>
    <?php
}