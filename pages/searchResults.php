<?php
require_once __DIR__ . '/../classes/MovieAPI.php';
require_once __DIR__ . '/../includes/head.php';

$current_page = 'search';
$query = $_GET['query'] ?? '';

try {
    $api = MovieAPI::getInstance();
    $results = $api->searchMovies($query);
} catch (Exception $e) {
    error_log($e->getMessage());
    $results = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<main class="search-results">
    <h2>Résultats pour "<?= htmlspecialchars($query) ?>"</h2>

    <?php if (!empty($results)): ?>
        <div class="movies-grid">
            <?php foreach ($results as $movie): ?>
                <a href="moviesDetails.php?id=<?= $movie['id'] ?>" class="movie-card">
                    <?php if ($movie['poster_path']): ?>
                        <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>" alt="<?= $movie['title'] ?>">
                    <?php endif; ?>
                    <h3><?= $movie['title'] ?></h3>
                    <p><?= date('Y', strtotime($movie['release_date'])) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="error-message">Aucun résultat trouvé pour "<?= htmlspecialchars($query) ?>"</div>
    <?php endif; ?>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>