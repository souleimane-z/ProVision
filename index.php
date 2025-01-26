<?php
require_once 'includes/meta_config.php';
require_once 'includes/head.php';
require_once 'classes/MovieAPI.php';
require_once 'classes/ShowsAPI.php';

$showsApi = ShowsAPI::getInstance();
$api = MovieAPI::getInstance();
$current_page = basename($_SERVER['PHP_SELF']);


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

$genreSeries = [];
foreach ($categories as $name => $genreId) {
    $genreSeries[$name] = $showsApi->getSeriesByGenre($genreId, 4);
}

$genreMovies = [];
foreach ($categories as $name => $genreId) {
    $genreMovies[$name] = $api->getMoviesByGenreAndYear($genreId, 2024, 4);
}
?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>
<link rel="stylesheet" href="pages/moviesShows/movies.css">
<body>
<!-- Include : Barre de Navigation -->

<?php
require_once 'includes/components/movies/card.php';
include_once __DIR__ . '/includes/nav.php';
?>

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
                <p class="banner-paragraph">Un monde d'histoires inconnues à la portée d'un clic!</p>
            </div>
        </div>
        <div>
            <button class="btn-subscribe">s'abonner</button>
        </div>
    </div>
</header>
<main>

    <div class="page-movies">
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
            <div class="page-movies">
                <section class="genres sectionsMain">
                    <div class="subscribeHome-text sectionsMain_txt">
                        <h3>Explorer par genre</h3>
                    </div>

                    <div class="carousel-section">
                        <div class="swiper genreSwiper">
                            <div class="swiper-wrapper">
                                <?php foreach (array_chunk($genreSeries, 4, true) as $genreGroup): ?>
                                    <div class="swiper-slide">
                                        <div class="genre-grid">
                                            <?php foreach ($genreGroup as $category => $series): ?>
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
            </div>
        </section>
    </div>
    <div class="fade_rule"></div>

    <section class="subscribeHome sectionsMain">
        <div class="subscribeHome-text sectionsMain_txt">
            <h3>Choisissez le forfait qui vous convient</h3>
            <span>Des forfaits adaptés à tous les besoins</span>
        </div>

        <div class="subscribeHome-container">
            <div class="subscribeHome-card">
                <div class="subscribeHome-txt">
                    <span class="subscribeHome-title">Standard</span>
                    <span class="subscribeHome-description">Full HD</span>
                    <span class="subscribeHome-description">1 Écran</span>
                    <span class="subscribeHome-description">Avec Pub</span>
                    <span class="subscribeHome-price">10,99 &euro;/mois ou 110 &euro;/an</span>
                </div>
                <div class="subscribeHome-btn">
                    <button class="tryYourself" id="standard">Essai Gratuit</button>
                </div>
            </div>
            <div class="subscribeHome-card">
                <div class="subscribeHome-txt">
                    <span class="subscribeHome-title">Premium</span>
                    <span class="subscribeHome-description">4K HDR</span>
                    <span class="subscribeHome-description">4 Écran</span>
                    <span class="subscribeHome-description">Sans Pub</span>
                    <span class="subscribeHome-price">14,99 &euro;/mois ou 170 &euro;/an</span>
                </div>
                <div class="subscribeHome-btn">
                    <button class="tryYourself" id="premium">Essai Gratuit</button>
                </div>
            </div>
        </div>
    </section>
</main>

    <!-- Include : Footer -->
    <?php include_once __DIR__ . '/includes/footer.php'; ?>

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