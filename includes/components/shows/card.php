<?php
function renderShowCard($show) {
    if (!$show) return;
    $showUrl = BASE_URL . "pages/moviesShows/showDetails.php?id=" . $show['id'];

    $runtime = $show['episode_run_time'][0] ?? 0;
    $duration = $runtime > 0 ? floor($runtime/60).'h'.str_pad($runtime%60, 2, '0', STR_PAD_LEFT) : '-';

    ?>
    <a href="<?= $showUrl ?>" class="moviesCard">
        <div class="movies-img">
            <img src="<?= TMDB_IMAGE_BASE_URL . $show['poster_path'] ?>"
                 alt="<?= $show['name'] ?>"
                 title="<?= $show['name'] ?>"
                 loading="lazy">
        </div>
        <div class="moviesCardDetails">
            <span><i class="fa-solid fa-star"></i><?= number_format($show['vote_average'], 1) ?></span>
            <span><i class="fa-solid fa-clock"></i><?= $duration ?></span>
        </div>
    </a>
    <?php
}
?>