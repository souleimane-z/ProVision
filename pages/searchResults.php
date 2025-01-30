<?php
require_once __DIR__ . '/../classes/MovieAPI.php';
require_once __DIR__ . '/../classes/ShowsAPI.php';
require_once __DIR__ . '/../includes/head.php';

$current_page = 'searchResults.php';
$query = $_GET['query'] ?? '';

try {
    $movieAPI = MovieAPI::getInstance();
    $showsAPI = ShowsAPI::getInstance();

    $movieResults = $movieAPI->searchMovies($query);
    $showResults = $showsAPI->searchShows($query);
} catch (Exception $e) {
    error_log($e->getMessage());
    $movieResults = [];
    $showResults = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Résultats de recherche pour votre requête">
    <meta name="keywords" content="recherche, résultats, films, séries">
    <meta name="author" content="Souleimane, Hugo, Nassim">

    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dhqh98spd/image/upload/v1738233667/favicon_dnsrul.ico" />

    <title>Résultats de recherche | ProVision</title>

    <link rel="stylesheet" href="../style.css" type="text/css">
    <link rel="stylesheet" href="searchResults.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/386dcd1ba2.js" crossorigin="anonymous"></script>

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="/../assets/js/main.js" defer></script>
</head>
<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main class="search-results">
    <h2>Résultats pour <span style="color: #e2d703; font-weight: bolder; text-transform: uppercase">"<?= htmlspecialchars($query) ?>"</span></h2>

    <?php if (!empty($movieResults) || !empty($showResults)): ?>
        <!-- Section Films -->
        <?php if (!empty($movieResults)): ?>
            <h3>Films</h3>
            <div class="movies-grid">
                <?php foreach ($movieResults as $movie): ?>
                    <a href="moviesShows/moviesDetails.php?id=<?= $movie['id'] ?>" class="movie-card">
                        <?php if ($movie['poster_path']): ?>
                            <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>" alt="<?= $movie['title'] ?>">
                        <?php endif; ?>
                        <h3><?= $movie['title'] ?></h3>
                        <p><?= date('Y', strtotime($movie['release_date'])) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Section Séries -->
        <?php if (!empty($showResults)): ?>
            <h3>Séries</h3>
            <div class="movies-grid">
                <?php foreach ($showResults as $show): ?>
                    <a href="moviesShows/showDetails.php?id=<?= $show['id'] ?>" class="movie-card">
                        <?php if ($show['poster_path']): ?>
                            <img src="<?= TMDB_IMAGE_BASE_URL . $show['poster_path'] ?>" alt="<?= $show['name'] ?>">
                        <?php endif; ?>
                        <h3><?= $show['name'] ?></h3>
                        <p><?= date('Y', strtotime($show['first_air_date'])) ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="error-message">Aucun résultat trouvé pour <span style="color: #cccccc; font-weight: bolder">"<?= htmlspecialchars($query) ?>"</span></div>
    <?php endif; ?>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>