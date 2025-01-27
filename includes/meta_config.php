<?php
function getPageMetas($current_page) {
    return [
        'index.php' => [
            'title' => 'Accueil',
            'description' => 'Plateforme de streaming ProVision - Films et séries en streaming HD',
            'keywords' => 'streaming, films, séries, HD, nouveautés, vision professionnelle, diffusion en continu, VOD',
            'css' => ['/style.css'],
        ],
        'movies.php' => [
            'title' => 'Films',
            'description' => 'Explorez notre catalogue de films - Action, Comédie, Drame, Science-fiction',
            'keywords' => 'films streaming, films HD, nouveaux films, cinéma, VOD',
            'css' => [
                '/style.css',
                '/pages/moviesShows/movies.css',
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                '/assets/js/main.js'
            ]
        ],
        'shows.php' => [
            'title' => 'Séries',
            'description' => 'Découvrez nos séries en streaming',
            'keywords' => 'séries TV, séries streaming, nouvelles séries',
            'css' => ['/style.css', '/pages/moviesShows/shows.css'],
        ],
        'subscription.php' => [
            'title' => 'Abonnements',
            'description' => 'Nos formules d\'abonnement streaming',
            'keywords' => 'abonnement streaming, offres, tarifs',
            'css' => ['/style.css', '/pages/subscription.css'],
        ],
        'login.php' => [
            'title' => 'Connexion',
            'description' => 'Connectez-vous à votre compte ProVision',
            'keywords' => 'login, connexion, compte streaming',
            'css' => ['/style.css', '/pages/forms.css'],
        ],
        'register.php' => [
            'title' => 'Inscription',
            'description' => 'Créez votre compte ProVision',
            'keywords' => 'inscription, création compte, streaming',
            'css' => ['/style.css', '/pages/forms.css'],
        ],
        'moviesDetails.php' => [
          'title' => 'Détails du film',
            'description' => 'Découvrez les détails du film',
            'keywords' => 'film, détails, casting',
            'css' => ['/style.css', '/pages/moviesShows/moviesDetails.css'],
        ],
        'default' => [
            'title' => 'ProVision',
            'description' => 'ProVision - Votre plateforme de streaming',
            'keywords' => 'streaming, films, séries, VOD',
            'css' => ['/style.css'],
        ]
    ];
}