<?php
require_once '../../includes/meta_config.php';
require_once '../../includes/head.php';
require_once '../../classes/ShowsAPI.php';

$current_page = basename($_SERVER['PHP_SELF']);

try {
    $api = ShowsAPI::getInstance();
    if (isset($_GET['id'])) {
        $show = $api->getShowDetails($_GET['id']);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    $show = null;
}
?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../../includes/nav.php'; ?>

<main>
    <?php if ($show): ?>
        <header class="movie-hero">
            <div class="movie-backdrop" style="background-image: url('<?= TMDB_IMAGE_BASE_URL . str_replace('/w1500/', '/original/', $show['backdrop_path']) ?>');"></div>
            <div class="hero-content">
                <div class="movie-poster">
                    <img src="<?= TMDB_IMAGE_BASE_URL . $show['poster_path'] ?>" alt="<?= $show['name'] ?>">
                </div>
                <div class="hero-info">
                    <h1><?= $show['name'] ?></h1>
                    <button class="play-button">
                        <i class="fas fa-play"></i>
                        Lecture
                    </button>
                </div>
            </div>
        </header>

        <div class="movie-main">
            <div class="movie-content">
                <div class="synopsis">
                    <h2>Synopsis</h2>
                    <p><?= $show['overview'] ?></p>
                </div>

                <!-- Saisons -->
                <div class="seasons-section">
                    <h2>Saisons</h2>
                    <div class="seasons-grid">
                        <?php foreach ($show['seasons'] as $season): ?>
                            <?php if ($season['season_number'] > 0): ?>
                                <div class="season-card">
                                    <?php if ($season['poster_path']): ?>
                                        <img src="<?= TMDB_IMAGE_BASE_URL . $season['poster_path'] ?>"
                                             alt="Saison <?= $season['season_number'] ?>">
                                    <?php endif; ?>
                                    <div class="season-info">
                                        <h3>Saison <?= $season['season_number'] ?></h3>
                                        <p><?= $season['episode_count'] ?> épisodes</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                <!-- Casting -->
                <div class="cast">
                    <h2>Casting principal</h2>
                    <div class="movie-cast">
                        <?php
                        $mainCast = array_slice($show['credits']['cast'], 0, 6);
                        foreach ($mainCast as $actor): ?>
                            <div class="cast-member">
                                <?php if ($actor['profile_path']): ?>
                                    <img src="<?= TMDB_IMAGE_BASE_URL . $actor['profile_path'] ?>"
                                         alt="<?= $actor['name'] ?>">
                                <?php else: ?>
                                    <div class="placeholder-image"></div>
                                <?php endif; ?>
                                <p><?= $actor['name'] ?></p>
                                <small><?= $actor['character'] ?></small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Images -->
                    <div class="episodes-accordion">
                        <?php foreach ($show['seasons'] as $season): ?>
                            <?php if ($season['season_number'] > 0): ?>
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        <span>Saison <?= $season['season_number'] ?></span>
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="accordion-content">
                                        <?php
                                        $seasonDetails = $api->getSeasonDetails($show['id'], $season['season_number']);
                                        foreach ($seasonDetails['episodes'] as $episode):
                                            ?>
                                            <div class="episode-card">
                                                <?php if ($episode['still_path']): ?>
                                                    <img src="<?= TMDB_IMAGE_BASE_URL . $episode['still_path'] ?>"
                                                         alt="<?= $episode['name'] ?>">
                                                <?php endif; ?>
                                                <div class="episode-info">
                                                    <h4>
                                                        <span class="episode-number"><?= $episode['episode_number'] ?>.</span>
                                                        <?= $episode['name'] ?>
                                                    </h4>
                                                    <p class="episode-overview"><?= $episode['overview'] ?></p>
                                                    <div class="episode-details">
                                                        <span class="air-date"><?= date('d/m/Y', strtotime($episode['air_date'])) ?></span>
                                                        <span class="duration"><?= $episode['runtime'] ?> min</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            <!-- Colonne de droite -->
            <div class="movie-details">
                <div class="detail-item">
                    <h3>Première diffusion</h3>
                    <p><?= date('d/m/Y', strtotime($show['first_air_date'])) ?></p>
                </div>

                <div class="detail-item">
                    <h3>Note TMDB</h3>
                    <p><i class="fas fa-star"></i> <?= number_format($show['vote_average'], 1) ?>/10</p>
                </div>

                <div class="detail-item">
                    <h3>Genres</h3>
                    <div class="genres">
                        <?php foreach ($show['genres'] as $genre): ?>
                            <span><?= $genre['name'] ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="detail-item">
                    <h3>Statut</h3>
                    <p><?= $show['status'] ?></p>
                </div>

                <div class="detail-item">
                    <h3>Nombre de saisons</h3>
                    <p><?= count($show['seasons']) ?> saisons</p>
                </div>

                <div class="detail-item">
                    <h3>Créateur</h3>
                    <?php if (!empty($show['created_by'])):
                        $creator = $show['created_by'][0]; ?>
                        <div class="director">
                            <?php if ($creator['profile_path']): ?>
                                <img src="<?= TMDB_IMAGE_BASE_URL . $creator['profile_path'] ?>"
                                     alt="<?= $creator['name'] ?>">
                            <?php endif; ?>
                            <div>
                                <p><?= $creator['name'] ?></p>
                                <small>Créateur</small>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="error">Série non trouvée</div>
    <?php endif; ?>
            <div class="video-modal">
                <div class="video-container">
                    <button class="close-video">
                        <i class="fas fa-times"></i>
                    </button>
                    <video class="video-player" controls>
                        <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                        Votre navigateur ne prend pas en charge la lecture vidéo.
                    </video>
                </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionHeaders = document.querySelectorAll('.accordion-header');

        accordionHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const item = this.parentElement;
                const content = this.nextElementSibling;

                document.querySelectorAll('.accordion-item').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                        otherItem.querySelector('.accordion-content').style.display = 'none';
                        otherItem.querySelector('.accordion-header').classList.remove('active');
                    }
                });

                item.classList.toggle('active');
                header.classList.toggle('active');

                if (item.classList.contains('active')) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        });
    });
</script>
</body>
</html>