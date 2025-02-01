<?php
require_once 'includes/meta_config.php';
require_once 'includes/head.php';
require_once 'classes/MovieAPI.php';
require_once 'classes/ShowsAPI.php';

$movieApi = MovieAPI::getInstance();
$showsApi = ShowsAPI::getInstance();
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

$genreMovies = [];
foreach ($categories as $name => $genreId) {
    $genreMovies[$name] = $movieApi->getMoviesByGenreAndYear($genreId, 2024, 4);
}

try {
    $api = ShowsAPI::getInstance();


    $categoriesTV = [
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

    $newShows = array_chunk($showsApi->getSeriesByRelease(25), 5);
    $trendingShows = array_chunk($showsApi->getTrendingSeries(25), 5);

    $genreShows = [];
    foreach ($categoriesTV as $name => $genreId) {
        $genreShows[$name] = $showsApi->getSeriesByGenreAndYear($genreId, 2024, 4);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
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
            $sliderMovies = array_slice($movieApi->getTrendingFamilyMovies(), 0, 4);
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
                <h3>Explorez les catégories de films</h3>
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
                                                    <a href="<?= BASE_URL ?>pages/moviesShows/moviesDetails.php?id=<?= $movies[0]['id'] ?>">
                                                        <img src="<?= TMDB_IMAGE_BASE_URL . $movies[0]['poster_path'] ?>"
                                                             alt="<?= $movies[0]['title'] ?>"
                                                             title="<?= $movies[0]['title'] ?>">
                                                    </a>
                                                    <a href="<?= BASE_URL ?>pages/moviesShows/moviesDetails.php?id=<?= $movies[1]['id'] ?>">
                                                        <img src="<?= TMDB_IMAGE_BASE_URL . $movies[1]['poster_path'] ?>"
                                                             alt="<?= $movies[1]['title'] ?>"
                                                             title="<?= $movies[1]['title'] ?>">
                                                    </a>
                                                </div>
                                                <div class="card-img_row second-row">
                                                    <a href="<?= BASE_URL ?>pages/moviesShows/moviesDetails.php?id=<?= $movies[2]['id'] ?>">
                                                        <img src="<?= TMDB_IMAGE_BASE_URL . $movies[2]['poster_path'] ?>"
                                                             alt="<?= $movies[2]['title'] ?>"
                                                             title="<?= $movies[2]['title'] ?>">
                                                    </a>
                                                    <a href="<?= BASE_URL ?>pages/moviesShows/moviesDetails.php?id=<?= $movies[3]['id'] ?>">
                                                        <img src="<?= TMDB_IMAGE_BASE_URL . $movies[3]['poster_path'] ?>"
                                                             alt="<?= $movies[3]['title'] ?>"
                                                             title="<?= $movies[3]['title'] ?>">
                                                    </a>
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
        <section class="genres sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Explorez les catégories des séries</h3>
            </div>

            <div class="carousel-section">
                <div class="swiper genreSwiper">
                    <div class="swiper-wrapper">
                        <?php foreach (array_chunk($genreShows, 4, true) as $genreGroup): ?>
                            <div class="swiper-slide">
                                <div class="genre-grid">
                                    <?php foreach ($genreGroup as $categoriesTV => $shows): ?>
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
                                                <h6><?= $categoriesTV ?></h6>
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
    <div class="fade_rule"></div>

    <?php
    $subscriptionPlans = [
        'standard' => [
            'title' => 'Standard',
            'features' => [
                'Full HD',
                '1 Écran',
                'Avec Pub',
                'Catalogue limité'
            ],
            'price' => [
                'monthly' => 10.99,
                'yearly' => 110
            ]
        ],
        'premium' => [
            'title' => 'Premium',
            'features' => [
                '4K HDR',
                '4 Écrans',
                'Sans Pub',
                'Catalogue complet'
            ],
            'price' => [
                'monthly' => 14.99,
                'yearly' => 170
            ]
        ]
    ];
    ?>

        <section class="subscribeHome sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Choisissez le forfait qui vous convient</h3>
                <span>Des forfaits adaptés à tous les besoins</span>
            </div>

            <div class="subscribeHome-container">
                <?php foreach($subscriptionPlans as $planId => $plan):?>
                    <div class="subscribeHome-card">
                        <div class="subscribeHome-header">
                            <span class="subscribeHome-title"><?= $plan['title']?></span>
                        </div>
                        <div class="subscribeHome-features">
                            <ul>
                                <?php foreach($plan['features'] as $feature):?>
                                    <li><?= $feature?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="subscribeHome-pricing">
                            <span class="subscribeHome-price"><?= number_format($plan['price']['monthly'], 2)?> €/mois</span>
                            <span class="subscribeHome-price-yearly">ou <?= $plan['price']['yearly']?> €/an</span>
                        </div>
                        <div class="subscribeHome-btn">
                            <button class="tryYourself" id="<?= $planId?>">Essai Gratuit</button>
                        </div>
                    </div>
                <?php endforeach;?>
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