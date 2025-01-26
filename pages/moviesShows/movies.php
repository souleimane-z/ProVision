<?php
require_once '../../includes/meta_config.php';
require_once '../../includes/head.php';
require_once '../../classes/MovieAPI.php';
require_once '../../includes/components/movies/card.php';

$current_page = basename($_SERVER['PHP_SELF']);

try {
    $api = MovieAPI::getInstance();

    // Configuration des catégories
    $categories = [
        'Comédie' => 35,
        'Action' => 28,
        'Drame' => 18,
        'Science-Fiction' => 878,
        'Animation' => 16,
        'Aventure' => 12,
        'Crime' => 80,
        'Fantastique' => 14,
        'Thriller' => 53,
        'Horreur' => 27,
        'Romance' => 10749,
        'Guerre' => 10752,
        'Histoire' => 36,
        'Musique' => 10402,
        'Documentaire' => 99,
    ];

    // Pour les nouveautés (5 films fixes + 5 slides de 5 films)
    $newMovies = array_chunk($api->getMoviesByRelease(25), 5);

    // Pour les tendances
    $trendingMovies = array_chunk($api->getTrendingMovies(25), 5);

    // Pour les genres
    $genreMovies = [];
    foreach ($categories as $name => $genreId) {
        $genreMovies[$name] = $api->getMoviesByGenreAndYear($genreId, 2024, 4);
    }

} catch (Exception $e) {
    error_log($e->getMessage());
}
?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<header>
    <div class="header-banner">
        <div class="slider">
            <?php
            $sliderMovies = array_slice($api->getTrendingFamilyMovies(), 0, 4);
            foreach ($sliderMovies as $index => $movie):
                ?>
                <div class="slide" style="background-image: url('<?= TMDB_IMAGE_BASE_URL . str_replace('/w1500/', '/original/', $movie['backdrop_path']) ?>'); animation-delay: -<?= $index * 3.8 ?>s;"></div>
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
        <div class="moviesTitle">Films</div>

        <?php
        include_once __DIR__ . '/../../includes/components/movies/newMovies.php';
        include_once __DIR__ . '/../../includes/components/movies/trendingMovies.php';
        include_once __DIR__ . '/../../includes/components/movies/genreMovies.php';
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