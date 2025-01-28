<?php
require_once '../../includes/meta_config.php';
require_once '../../includes/head.php';
require_once '../../classes/MovieAPI.php';

$current_page = basename($_SERVER['PHP_SELF']);

try {
    $api = MovieAPI::getInstance();

    if (isset($_GET['id'])) {
        $movie = $api->getMovieDetails($_GET['id']);
    } else {
        $movie = $api->getMostPopularMovie2025();
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    $movie = null;
}

?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<main>
    <?php if (isset($_GET['error'])): ?>
        <div class="error">Aucun film trouvé</div>
    <?php endif; ?>

    <?php if ($movie): ?>
    <?php else: ?>
        <div class="error">Film non trouvé</div>
    <?php endif; ?>

    <?php if ($movie): ?>

        <header class="movie-hero">
            <div class="movie-backdrop" style="background-image: url('<?= TMDB_IMAGE_BASE_URL . str_replace('/w1500/', '/original/', $movie['backdrop_path']) ?>');"></div>
            <div class="hero-content">
                <div class="movie-poster">
                    <img src="<?= TMDB_IMAGE_BASE_URL . $movie['poster_path'] ?>"
                         alt="<?= $movie['title'] ?>">
                </div>
                <div class="hero-info">
                    <h1><?= $movie['title'] ?></h1>
                    <button class="play-button">
                        <i class="fas fa-play"></i>
                        Lecture
                    </button>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <div class="movie-main">
            <!-- Colonne principale -->
            <div class="movie-content">
                <div class="synopsis">
                    <h2>Synopsis</h2>
                    <p><?= $movie['overview'] ?></p>
                </div>

                <div class="cast">
                    <h2>Casting principal</h2>
                    <div class="movie-cast">
                        <?php
                        $mainCast = array_slice($movie['credits']['cast'], 0, 6);
                        foreach ($mainCast as $actor): ?>
                            <div class="cast-member">
                                <?php if ($actor['profile_path']): ?>
                                    <img src="<?= TMDB_IMAGE_BASE_URL . $actor['profile_path'] ?>"
                                         alt="<?= $actor['name'] ?>">
                                <?php else: ?>
                                    <div style="width: 120px; height: 120px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                                <?php endif; ?>
                                <p><?= $actor['name'] ?></p>
                                <small style="color: #999;"><?= $actor['character'] ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Colonne de droite -->
            <div class="movie-details">
                <div class="detail-item">
                    <h3>Date de sortie</h3>
                    <p><?= date('d/m/Y', strtotime($movie['release_date'])) ?></p>
                </div>

                <div class="detail-item">
                    <h3>Note TMDB</h3>
                    <p><i class="fas fa-star" style="color: var(--primary);"></i> <?= number_format($movie['vote_average'], 1) ?>/10</p>
                </div>

                <div class="detail-item">
                    <h3>Genres</h3>
                    <div class="genres">
                        <?php foreach ($movie['genres'] as $genre): ?>
                            <span><?= $genre['name'] ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="detail-item">
                    <h3>Langues disponibles</h3>
                    <div class="languages">
                        <?php foreach ($movie['spoken_languages'] as $language): ?>
                            <span><?= $language['english_name'] ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="detail-item">
                    <h3>Réalisateur</h3>
                    <?php
                    $director = array_filter($movie['credits']['crew'], function($person) {
                        return $person['job'] === 'Director';
                    });
                    $director = reset($director);
                    if ($director): ?>
                        <div class="director">
                            <?php if ($director['profile_path']): ?>
                                <img src="<?= TMDB_IMAGE_BASE_URL . $director['profile_path'] ?>"
                                     alt="<?= $director['name'] ?>">
                            <?php else: ?>
                                <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
                            <?php endif; ?>
                            <div>
                                <p><?= $director['name'] ?></p>
                                <small style="color: #999;">Réalisateur</small>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>