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
<?php
// Import des données
require_once __DIR__ . '/../../data/movies.php';
?>
<header>
    <!-- Include : Barre de Navigation -->
    <?php include_once __DIR__ . '/../../includes/nav.php'; ?>

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


        <section class="newAddition sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Nouvelles sorties</h3>
            </div>

            <div class="movies-cards_container">
                <?php foreach ($newAddition as $movie): ?>
                    <div class="moviesCard">
                        <div class="movies-img">
                                <img src="<?php echo htmlspecialchars($movie['movieImg'] ?: 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg'); ?>"
                                     alt="<?php echo htmlspecialchars($movie['movieName']); ?>"
                                     title="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        </div>
                        <div class="moviesCardDetails">
                            <span><i class="fa-solid fa-clock"></i><?php echo htmlspecialchars($movie['movieTiming']); ?></span>
                            <span><i class="fa-solid fa-eye"></i><?php echo htmlspecialchars($movie['movieViewCount']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="trendingNow sectionsMain">
            <div class="subscribeHome-text sectionsMain_txt">
                <h3>Populaire en ce moment</h3>
            </div>

            <div class="movies-cards_container">
                <?php foreach ($trendingNow as $movie): ?>
                    <div class="moviesCard">
                        <div class="movies-img">
                                <img src="<?php echo htmlspecialchars($movie['movieImg'] ?: 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg'); ?>"
                                     alt="<?php echo htmlspecialchars($movie['movieName']); ?>"
                                     title="<?php echo htmlspecialchars($movie['movieName']); ?>">
                        </div>
                        <div class="moviesCardDetails">
                            <span><i class="fa-solid fa-clock"></i><?php echo htmlspecialchars($movie['movieTiming']); ?></span>
                            <span><i class="fa-solid fa-eye"></i><?php echo htmlspecialchars($movie['movieViewCount']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        </div>
</main>

<!-- Include : Footer -->
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