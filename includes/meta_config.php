<?php
require_once __DIR__ . '/config.php';
function getPageMetas($current_page) {
    return [
        'index.php' => [
            'title' => 'Accueil',
            'description' => 'Plateforme de streaming ProVision - Films et séries en streaming HD',
            'keywords' => 'streaming, films, séries, HD, nouveautés, vision professionnelle, diffusion en continu, VOD',
            'css' => [BASE_URL . 'style.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'movies.php' => [
            'title' => 'Films',
            'description' => 'Explorez notre catalogue de films - Action, Comédie, Drame, Science-fiction',
            'keywords' => 'films streaming, films HD, nouveaux films, cinéma, VOD',
            'css' => [
                BASE_URL . 'style.css',
                BASE_URL . 'pages/moviesShows/movies.css',
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'shows.php' => [
            'title' => 'Séries',
            'description' => 'Découvrez nos séries en streaming',
            'keywords' => 'séries TV, séries streaming, nouvelles séries',
            'css' => [BASE_URL . 'style.css', BASE_URL . 'pages/moviesShows/shows.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'subscription.php' => [
            'title' => 'Abonnements',
            'description' => 'Nos formules d\'abonnement streaming',
            'keywords' => 'abonnement streaming, offres, tarifs',
            'css' => [BASE_URL . 'style.css', BASE_URL . 'pages/subscription.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'login.php' => [
            'title' => 'Connexion',
            'description' => 'Connectez-vous à votre compte ProVision',
            'keywords' => 'login, connexion, compte streaming',
            'css' => [BASE_URL . 'style.css', BASE_URL . 'pages/forms.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'register.php' => [
            'title' => 'Inscription',
            'description' => 'Créez votre compte ProVision',
            'keywords' => 'inscription, création compte, streaming',
            'css' => [BASE_URL . 'style.css', BASE_URL . 'pages/forms.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'moviesDetails.php' => [
            'title' => 'Détails du film',
            'description' => 'Découvrez les détails du film',
            'keywords' => 'film, détails, casting',
            'css' => [
                BASE_URL . 'style.css',
                BASE_URL . 'pages/moviesShows/moviesDetails.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'showDetails.php' => [
            'title' => 'Détails du film',
            'description' => 'Découvrez les détails du film',
            'keywords' => 'film, détails, casting',
            'css' => [
                BASE_URL . 'style.css',
                BASE_URL . 'pages/moviesShows/showDetails.css',
                BASE_URL . 'pages/moviesShows/moviesDetails.css'

            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'searchResults.php' => [
            'title' => 'Résultats de recherche',
            'description' => 'Résultats de recherche pour votre requête',
            'keywords' => 'recherche, résultats, films, séries',
            'css' => [
                BASE_URL . 'style.css',
                BASE_URL . 'pages/searchResults.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ],
        'default' => [
            'title' => 'ProVision',
            'description' => 'ProVision - Votre plateforme de streaming',
            'keywords' => 'streaming, films, séries, VOD',
            'css' => [BASE_URL . 'style.css'],
            'js' => [
                'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
                BASE_URL . 'assets/js/main.js'
            ]
        ]
    ];
}