<?php
$logo = "<img src='https://res.cloudinary.com/dhqh98spd/image/upload/v1738224132/logo-cropped_usammu.svg' alt='Logo - ProVision' title='Logo - ProVision' class='header-logo'>";

/* Bouton : se déconnecter*/
$isLoggedIn = false;
$logout_icon = "<img src='https://res.cloudinary.com/dhqh98spd/image/upload/v1738682662/shutdown-svgrepo-com_wgjmzc.png' alt='logout icon' class='logout-icon' title='Se Déconnecter'>";

if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '63342') {
    // Environnement PHPStorm
    define('BASE_URL', 'http://localhost:63342/ProVision/');
} else if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '8000') {
    // Environnement XAMPP
    define('BASE_URL', 'http://localhost:8000/ProVision/');
} else {
    // URL relative par défaut
    define('BASE_URL', '/ProVision/');
}

?>