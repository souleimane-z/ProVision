<?php
$current_page = basename($_SERVER['PHP_SELF']);
include_once __DIR__ . '/config.php';
include_once __DIR__ . '/functions.php';;
?>
<nav class="header-navbar" id="homepage">
        <!-- Voir config.php -->
        <?php echo $logo; ?>

    <ul class="header-list">
        <!--
            Code qui dit "si nous sommes dans la page accueil ALORS ne pas afficher liens vers la page accueil" etc
        -->
        <?php if($current_page !== 'index.php'): ?>
            <li><a href="<?php echo BASE_URL; ?>index.php">Accueil</a></li>
        <?php endif; ?>

        <?php if($current_page !== 'movies.php'): ?>
            <li><a href="<?php echo BASE_URL; ?>/pages/moviesShows/movies.php">Films</a></li>
        <?php endif; ?>

        <?php if($current_page !== 'shows.php'): ?>
            <li><a href="<?php echo BASE_URL; ?>/pages/moviesShows/shows.php">Séries</a></li>
        <?php endif; ?>

        <?php if($current_page !== 'subscription.php'): ?>
            <li><a href="<?php echo BASE_URL; ?>/pages/subscription.php">Abonnement</a></li>
        <?php endif; ?>
    </ul>
    <div class="header-search">
        <form action="<?= BASE_URL ?>pages/searchResults.php" method="get">
            <input type="text" name="query" id="searchBar" placeholder="Rechercher..." required>
            <button type="submit" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>

    <?php
    displayAuthButtons(null, $logout_icon);
    ?>
    <button class="nav-toggle">
        <i class="fas fa-bars"></i>
    </button>
</nav>