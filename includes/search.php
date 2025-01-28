<?php
require_once __DIR__ . '/../classes/MovieAPI.php';

if (!empty($_GET['query'])) {
    $api = MovieAPI::getInstance();
    $results = $api->searchMovies($_GET['query']);

    if (!empty($results)) {
        header("Location: moviesDetails.php?id=" . $results[0]['id']);
        exit;
    }
}

// Redirection si aucun résultat
header("Location: moviesDetails.php?error=no_results");
exit;