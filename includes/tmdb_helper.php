<?php
require_once __DIR__ . '/../config/tmdb.php';

if (!function_exists('getMoviesByGenre')) {
    function getMoviesByGenre($genreId) {
        $url = TMDB_BASE_URL . "/discover/movie?api_key=" . TMDB_API_KEY
            . "&with_genres=" . $genreId
            . "&language=fr-FR";
        return makeApiRequest($url);
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
if (!function_exists('getMovieDetails')) {
    function getMovieDetails($movieId) {
        $url = TMDB_BASE_URL . "/movie/" . $movieId . "?api_key=" . TMDB_API_KEY
            . "&language=fr-FR";
        return makeApiRequest($url);
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
        return makeApiRequest($url);
    }
}

if (!function_exists('getTrendingMovies')) {
    function getTrendingMovies() {
        $url = TMDB_BASE_URL . "/trending/movie/week?api_key=" . TMDB_API_KEY
            . "&language=fr-FR";
        return makeApiRequest($url);
    }
}

if (!function_exists('makeApiRequest')) {
    function makeApiRequest($url) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_VERBOSE => true,
            CURLOPT_PROXY => '172.16.0.253',
            CURLOPT_PROXYPORT => 3128,
            CURLOPT_CAINFO => __DIR__ . '/cacert.pem'
        ]);

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
        return makeApiRequest($url);
    }
}
?>