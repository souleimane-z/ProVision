<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" type="text/css" />
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
    <header>

        <nav class="header-navbar" id="homepage">
            <!-- Menu hamburger Responsive -->
            <button class="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <img src="./assets/img/Logo/logo-cropped.svg"
                 alt="Logo - ProVision"
                 title="Logo - ProVision"
                 class="header-logo"
            >
            <ul class="header-list">
                <li>
                    <a href="./index.php">Accueil</a>
                </li>
                <li>
                    <a href="pages/moviesShows/movies.php">Films</a>
                </li>
                <li>
                    <a href="#">Séries</a>
                </li>
                <li>
                    <a href="#">Abonnement</a>
                </li>
            </ul>

            <div class="header-search">
                <form action="#" method="get" enctype="application/x-www-form-urlencoded">
                    <label for="searchBar"></label>
                    <input type="text" id="searchBar" placeholder="Rechercher..." required>

                    <button class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="header-auth">
                <button class="btn-login" title="Se connecter">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </button>
                <button class="btn-signup" title="S'inscrire">
                    <i class="fa-solid fa-user-plus"></i>
                </button>
            </div>

        </nav>

        <div class="header-banner">
            <!-- Images qui défilent en arrière plan du header -->
            <div class="slider">
                <div class="slide"></div><div class="slide"></div><div class="slide"></div><div class="slide"></div>
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
        <section class="cards-categories">
            <div class="cards-categories-txt">
                <h3>Explorez nos catégories</h3>
                <span>Texte à modifier</span>
            </div>
            <div class="home-cards_container">
                <!-- COMÉDIE -->
                <div class="card">
                    <div class="card-img">
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/No%20Hard%20Feelings%20(2023).webp"
                                 alt="No Hard Feelings (2023)" title="No Hard Feelings (2023)">
                            <img src="/assets/img/Movies/The%20Banshees%20of%20Inisherin%20(2022).webp"
                                 alt="The Banshees of Inisherin (2022)" title="The Banshees of Inisherin (2022)">
                        </div>
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/The%20Unbearable%20Weight%20of%20Massive%20Talent%20(2022).webp"
                                 alt="The Unbearable Weight of Massive Talent (2022)" title="The Unbearable Weight of Massive Talent (2022)">
                            <img src="/assets/img/Movies/The%20Holdovers%20(2023).webp"
                                 alt="The Holdovers (2023)" title="The Holdovers (2023)">
                        </div>
                    </div>
                    <div class="card-explore">
                        <h6>Comédie</h6>
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <!-- ACTION -->
                <div class="card">
                    <div class="card-img">
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/Gladiator%20II%20(2024).webp"
                                 alt="Gladiator II (2024)" title="Gladiator II (2024)">
                            <img src="/assets/img/Movies/Top%20Gun-%20Maverick%20(2022).webp"
                                 alt="Top Gun- Maverick (2022)" title="Top Gun- Maverick (2022)">
                        </div>
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/Everything%20Everywhere%20All%20at%20Once%20(2022).webp"
                                 alt="Everything Everywhere All at Once (2022)" title="Everything Everywhere All at Once (2022)">
                            <img src="/assets/img/Movies/Bullet%20Train%20(2022).webp"
                                 alt="Bullet Train (2022)" title="Bullet Train (2022)">
                        </div>
                    </div>
                    <div class="card-explore">
                        <h6>Action</h6>
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <!-- DRAME -->
                <div class="card">
                    <div class="card-img">
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/Oppenheimer%20(2023).webp"
                                 alt="Oppenheimer (2023)" title="Oppenheimer (2023)">
                            <img src="/assets/img/Movies/Killers%20of%20the%20Flower%20Moon%20(2023).webp"
                                 alt="Killers of the Flower Moon (2023)" title="Killers of the Flower Moon (2023)">
                        </div>
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/The%20Whale%20(2022).webp"
                                 alt="The Whale (2022)" title="The Whale (2022)">
                            <img src="/assets/img/Movies/All%20Quiet%20on%20the%20Western%20Front%20(2022).webp"
                                 alt="All Quiet on the Western Front (2022)" title="All Quiet on the Western Front (2022)">
                        </div>
                    </div>
                    <div class="card-explore">
                        <h6>Drame</h6>
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <!-- SCI-FI -->
                <div class="card">
                    <div class="card-img">
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/Avatar-%20The%20Way%20of%20Water%20(2022).webp"
                                 alt="Avatar- The Way of Water (2022)" title="Avatar- The Way of Water (2022)">
                            <img src="/assets/img/Movies/The%20Batman%20(2022).webp"
                                 alt="The Batman (2022)" title="The Batman (2022)">
                        </div>
                        <div class="card-img_row">
                            <img src="/assets/img/Movies/Deadpool%20&%20Wolverine%20(2024).webp"
                                 alt="Deadpool & Wolverine (2024)" title="Deadpool & Wolverine (2024)">
                            <img src="/assets/img/Movies/Dune-%20Part%20Two%20(2024).webp"
                                 alt="Dune- Part Two (2024)" title="Dune- Part Two (2024)">
                        </div>
                    </div>
                    <div class="card-explore">
                        <h6>Sci-Fi</h6>
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <div class="fade_rule"></div>

        <section class="subscribeHome">
            <div class="subscribeHome-text">
                <h3>Choisissez le forfait qui vous convient</h3>
                <span>texte à modifier</span>
            </div>
            <div class="subscribeHome-container">
                <div class="subscribeHome-card">
                    <div class="subscribeHome-txt">
                        <span class="subscribeHome-title">Standard</span>
                        <span class="subscribeHome-description">Texte à modifier</span>
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
                        <span class="subscribeHome-description">Texte à modifier</span>
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

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Accueil</h4>
                    <ul>
                        <li><a href="#">Catégories</a></li>
                        <li><a href="#">Prix</a></li>
                        <li><a href="#">Films</a></li>
                        <li><a href="#">Séries</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>À Propos</h4>
                    <ul>
                        <li><a href="#">Nous contacter</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Appareils</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Abonnement</h4>
                    <ul>
                        <li><a href="#">Les Abonnements</a></li>
                        <li><a href="#">Les Nouveautés</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Nous suivre</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-legal">
            <div class="footer-copy">
                <a href="#">copyrights&#169;</a>
            </div>
            <div class="footer-legalinfos">
                <a href="#">Conditions d'utilisation</a>
                <a href="#">Politique</a>
                <a href="#">Cookies</a>
            </div>
        </div>
    </footer>

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