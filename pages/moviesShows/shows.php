<?php
require_once '../../includes/meta_config.php';
require_once '../../includes/head.php';
require_once '../../classes/ShowsAPI.php';
require_once '../../includes/components/shows/card.php';

$current_page = basename($_SERVER['PHP_SELF']);

try {
    $api = ShowsAPI::getInstance();

    // Configuration des catégories pour les séries TV
    $categories = [
        'Comédie' => 35,
        'Action & Aventure' => 10759,
        'Animation' => 16,
        'Sci-Fi & Fantasie' => 10765,
        'Drame' => 18,
        'Enfants' => 10762,
        'Mystère' => 9648,
        'News' => 10763,
        'Realité' => 10764,
        'Soap' => 10766,
        'Talk' => 10767,
        'Politique' => 10768,
    ];

    // Pour les nouveautés (5 séries fixes + 5 slides de 5 séries)
    $newShows = array_chunk($api->getSeriesByRelease(25), 5);

    // Pour les tendances
    $trendingShows = array_chunk($api->getTrendingSeries(25), 5);

    // Pour les genres
    $genreShows = [];
    foreach ($categories as $name => $genreId) {
        $genreShows[$name] = $api->getSeriesByGenreAndYear($genreId, 2024, 4);
    }

} catch (Exception $e) {
    error_log($e->getMessage());
}
?>

<!doctype html>
<html lang="fr">
<link rel="stylesheet" href="movies.css">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<header>
    <div class="header-banner">
        <div class="slider">
            <?php
            $sliderShows = array_slice($api->getTrendingSeries(), 0, 4);
            foreach ($sliderShows as $index => $show):
                ?>
                <div class="slide" style="background-image: url('<?= TMDB_IMAGE_BASE_URL . str_replace('/w1500/', '/original/', $show['backdrop_path']) ?>'); animation-delay: -<?= $index * 3.8 ?>s;"></div>
            <?php endforeach; ?>
        </div>
        <div>
            <div class="banner-txt">
                <h1 class="banner-title">ProVision</h1>
                <p class="banner-paragraph">Un monde d'histoires inconnus à la portée d'un clic!</p>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="page-movies">
        <div class="moviesTitle">Séries</div>

        <?php
        include_once __DIR__ . '/../../includes/components/shows/newShows.php';
        include_once __DIR__ . '/../../includes/components/shows/trendingShows.php';
        include_once __DIR__ . '/../../includes/components/shows/genreShows.php';
        ?>
    </div>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
<!-- Icônes sur fontawesome.com -->
<script src="https://kit.fontawesome.com/386dcd1ba2.js" crossorigin="anonymous"></script>

<!-- Menu hamburger pour le responsive -->
<script>
    document.querySelector('.nav-toggle').addEventListener('click', () => {
        document.querySelector('.header-list').classList.toggle('active');
    });
</script>
</body>
</html>