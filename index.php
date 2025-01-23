<?php
require_once 'includes/tmdb_helper.php';


$categories = [
    'Comédie' => 35,
    'Action' => 28,
    'Drame' => 18,
    'Sci-Fi' => 878
];


$moviesData = [];
foreach ($categories as $name => $genreId) {
    $moviesData[$name] = getMoviesByGenre($genreId);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <meta name="description" content="">
    <meta name="keywords" content="streaming vidéo, ProVision, plateforme de streaming, apprentissage en ligne, innovation, formation en ligne, vidéos éducatives, contenus interactifs, streaming HD, cours en ligne, vidéos à la demande, e-learning, tutoriels en ligne, innovation technologique, savoir-faire, streaming pédagogique, vidéos professionnelles, contenus exclusifs, plateforme de formation, éducation numérique, skill learning, amélioration des compétences, vision professionnelle, diffusion en continu">
    <meta name="author" content="Souleimane, Hugo, Nassim">
    <title>Accueil | ProVision</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<!-- Include : Barre de Navigation -->
<?php include_once __DIR__ . '/includes/nav.php'; ?>
    <header>


        <div class="header-banner">
            <?php
            $sliderMovies = array_slice(getTrendingFamilyMovies(), 0, 4);
            ?>
            <div class="slider">
                <?php foreach ($sliderMovies as $index => $movie): ?>
                    <div class="slide" style="background-image: url('<?= TMDB_IMAGE_BASE_URL . str_replace('/w1200/', '/original/', $movie['backdrop_path']) ?>'); animation-delay: -<?= $index * 3.8 ?>s;"></div>
                <?php endforeach; ?>
            </div>
            <div>
             <!-- Texte devant les images -->
            <div class="banner-txt">
                <h1 class="banner-title">ProVision</h1>

                <p class="banner-paragraph">Un monde d'histoires inconnues à la portée d'un clic!</p></div>
            </div>
            <div>
                <button class="btn-subscribe">s'abonner</button>
            </div>
        </div>
    </header>
<main>
    <section class="cards-categories sectionsMain">
        <div class="cards-categories-txt sectionsMain_txt">
            <h3>Explorez nos catégories</h3>
            <span>Les films les plus populaires par genre</span>
        </div>

        <div class="home-cards_container">
            <?php foreach ($moviesData as $category => $movies): ?>
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

        <div class="fade_rule"></div>

        <section class="subscribeHome sectionsMain">

            <div class="subscribeHome-text  sectionsMain_txt">
                <h3>Choisissez le forfait qui vous convient</h3>
                <span>Texte à modifier</span>
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
                        <button class="tryYourself" id="standard">
                                Essai Gratuit
                        </button>
                    </div>
                </div>
                <div class="subscribeHome-card">
                    <div class="subscribeHome-txt">
                        <span class="subscribeHome-title">Prenium</span>
                        <span class="subscribeHome-description">4K HDR</span>
                        <span class="subscribeHome-description">4 Écran</span>
                        <span class="subscribeHome-description">Sans Pub</span>
                        <span class="subscribeHome-price">14,99 &euro;/mois ou 170 &euro;/an</span>
                    </div>
                    <div class="subscribeHome-btn">
                        <button class="tryYourself" id="prenium">
                                Essai Gratuit
                        </button>
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