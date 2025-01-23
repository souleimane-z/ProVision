<?php
require_once 'includes/tmdb_helper.php';

try {
    // Test getMovieDetails
    $movieId = 27205;
    $movieDetails = getMovieDetails($movieId);
    echo "<h2>Détails basiques du film</h2>";
    echo "<h1>" . $movieDetails['title'] . "</h1>";
    echo "<p>" . $movieDetails['overview'] . "</p>";
    echo "<p>Date de sortie : " . $movieDetails['release_date'] . "</p>";
    echo "<img src='" . TMDB_IMAGE_BASE_URL . $movieDetails['poster_path'] . "' alt='" . $movieDetails['title'] . "'>";

    // Test getFullMovieDetails
    $fullDetails = getFullMovieDetails($movieId);
    echo "<h2>Détails complets</h2>";

    // Affichage du casting
    echo "<h3>Casting principal</h3>";
    foreach(array_slice($fullDetails['credits']['cast'], 0, 5) as $actor) {
        echo $actor['name'] . " joue " . $actor['character'] . "<br>";
    }

    // Affichage de la bande-annonce
    echo "<h3>Vidéos</h3>";
    if(!empty($fullDetails['videos']['results'])) {
        $trailer = $fullDetails['videos']['results'][0];
        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/" . $trailer['key'] . "'></iframe>";
    }

} catch (Exception $e) {
    echo '<p style="color:red;">Erreur : ' . $e->getMessage() . '</p>';
}