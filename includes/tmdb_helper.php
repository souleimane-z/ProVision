<?php
require_once __DIR__ . '/../config/tmdb.php';
require_once __DIR__ . '/../config/api_config.php';


$movieDetailsCache = [];

if (!function_exists('getMoviesByGenre')) {
    function getMoviesByGenre($genreId) {
        $url = TMDB_BASE_URL . "/discover/movie?api_key=" . TMDB_API_KEY
            . "&with_genres=" . $genreId
            . "&language=fr-FR";
        $movies = makeApiRequest($url);


        return array_map(function($movie) {
            return enrichMovieData($movie);
        }, $movies);
    }
}

if (!function_exists('getTrendingFamilyMovies')) {
    function getTrendingFamilyMovies() {
        $url = TMDB_BASE_URL . "/discover/movie?api_key=" . TMDB_API_KEY
            . "&certification_country=FR&certification.lte=12"
            . "&sort_by=popularity.desc&language=fr-FR";
        return makeApiRequest($url);
    }
}

if (!function_exists('enrichMovieData')) {
    function enrichMovieData($movie) {
        global $movieDetailsCache;

        if (!isset($movieDetailsCache[$movie['id']])) {
            $details = getMovieDetails($movie['id']);
            $movieDetailsCache[$movie['id']] = $details;
        }

        return array_merge($movie, $movieDetailsCache[$movie['id']]);
    }
}

if (!function_exists('getMovieDetails')) {
    function getMovieDetails($movieId) {
        global $movieDetailsCache;

        if (isset($movieDetailsCache[$movieId])) {
            return $movieDetailsCache[$movieId];
        }

        $url = TMDB_BASE_URL . "/movie/" . $movieId . "?api_key=" . TMDB_API_KEY
            . "&language=fr-FR";
        $details = makeApiRequest($url);
        $movieDetailsCache[$movieId] = $details;

        return $details;
    }
}

if (!function_exists('getFullMovieDetails')) {
    function getFullMovieDetails($movieId) {
        $url = TMDB_BASE_URL . "/movie/" . $movieId . "?api_key=" . TMDB_API_KEY
            . "&language=fr-FR&append_to_response=credits,videos,images";
        return makeApiRequest($url);
    }
}

if (!function_exists('getMoviesByRelease')) {
    function getMoviesByRelease() {
        $url = TMDB_BASE_URL . "/movie/now_playing?api_key=" . TMDB_API_KEY
            . "&language=fr-FR";
        $movies = makeApiRequest($url);
        return array_map('enrichMovieData', $movies);
    }
}

if (!function_exists('getTrendingMovies')) {
    function getTrendingMovies() {
        $url = TMDB_BASE_URL . "/trending/movie/week?api_key=" . TMDB_API_KEY
            . "&language=fr-FR";
        $movies = makeApiRequest($url);
        return array_map('enrichMovieData', $movies);
    }
}

if (!function_exists('makeApiRequest')) {
    function makeApiRequest($url) {
        $ch = curl_init();
        curl_setopt_array($ch, getCurlOptions($url));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            throw new Exception('Erreur cURL : ' . $error_msg);
        }

        curl_close($ch);
        $data = json_decode($response, true);

        if (!isset($data['results']) && !isset($data['id'])) {
            throw new Exception('Format de réponse invalide');
        }

        return isset($data['results']) ? $data['results'] : $data;
    }
}

if (!function_exists('searchMovies')) {
    function searchMovies($query) {
        $url = TMDB_BASE_URL . "/search/movie?api_key=" . TMDB_API_KEY
            . "&query=" . urlencode($query)
            . "&language=fr-FR";
        $movies = makeApiRequest($url);
        return array_map('enrichMovieData', $movies);
    }
}