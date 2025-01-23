<?php
require_once '../../includes/tmdb_helper.php';

try {
    // Configuration des catégories
    $categories = [
        'Comédie' => 35,
        'Action' => 28,
        'Drame' => 18,
        'Sci-Fi' => 878
    ];

    $newMovies = array_map(function($movie) {
        $details = getMovieDetails($movie['id']);
        $movie['runtime'] = $details['runtime'];
        return $movie;
    }, array_slice(getMoviesByRelease(), 0, 6));

    $trendingMovies = array_map(function($movie) {
        $details = getMovieDetails($movie['id']);
        $movie['runtime'] = $details['runtime'];
        return $movie;
    }, array_slice(getTrendingMovies(), 0, 6));

    $genreMovies = [];
    foreach ($categories as $name => $genreId) {
        $movies = getMoviesByGenre($genreId);
        $genreMovies[$name] = array_map(function($movie) {
            $details = getMovieDetails($movie['id']);
            $movie['runtime'] = $details['runtime'];
            return $movie;
        }, array_slice($movies, 0, 4));
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./movies.css" />
    <meta name="description" content="">
    <meta name="keywords" content="streaming vidéo, ProVision, plateforme de streaming, apprentissage en ligne, innovation, formation en ligne, vidéos éducatives, contenus interactifs, streaming HD, cours en ligne, vidéos à la demande, e-learning, tutoriels en ligne, innovation technologique, savoir-faire, streaming pédagogique, vidéos professionnelles, contenus exclusifs, plateforme de formation, éducation numérique, skill learning, amélioration des compétences, vision professionnelle, diffusion en continu">
    <meta name="author" content="Souleimane, Hugo, Nassim">
    <title>Films | ProVision</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<header>
    <div class="header-banner">
        <div class="slider">
            <div class="slide"></div><div class="slide"></div><div class="slide"></div><div class="slide"></div>
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

        <!-- Nouvelles Sorties -->
        <section class="newAddition sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Nouveautés</h3>
            </div>
            <div class="movies-cards_container">
                <?php foreach (array_slice($newMovies, 0, 5) as $movie): ?>
                    <div class="moviesCard">
                        <div class="movies-img">
                            <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>"
                                 alt="<?= $movie['title'] ?>"
                                 title="<?= $movie['title'] ?>">
                        </div>
                        <div class="moviesCardDetails">
                            <span><i class="fa-solid fa-star"></i><?= number_format($movie['vote_average'], 1) ?></span>
                            <span><i class="fa-solid fa-clock"></i><?= floor($movie['runtime']/60).'h'.($movie['runtime']%60) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Tendances -->
        <section class="trendingNow sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Tendances</h3>
            </div>
            <div class="movies-cards_container">
                <?php foreach (array_slice($trendingMovies, 0, 6) as $movie): ?>
                    <div class="moviesCard">
                        <div class="movies-img">
                            <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>"
                                 alt="<?= $movie['title'] ?>"
                                 title="<?= $movie['title'] ?>">
                        </div>
                        <div class="moviesCardDetails">
                            <span><i class="fa-solid fa-star"></i><?= number_format($movie['vote_average'], 1) ?></span>
                            <span><i class="fa-solid fa-clock"></i><?= floor($movie['runtime']/60).'h'.($movie['runtime']%60) ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Genres -->
        <section class="genres sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Explorer par genre</h3>
            </div>
            <div class="home-cards_container">
                <?php foreach ($genreMovies as $category => $movies): ?>
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
                            <div class="card-img_row">
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
        </section>
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