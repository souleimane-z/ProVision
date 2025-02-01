<?php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/functions.php';
include_once '../includes/meta_config.php';
include_once '../includes/head.php';

$current_page = basename($_SERVER['PHP_SELF']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if (verify_login($username, $password)) {
        header("Location: ../index.php");
        exit;
    } else {
        $errors[] = "Mot de passe ou nom d'utilisateur invalide.";
    }
}
// valeurs par défault pour le développement
// $default_username = 'admin';
// $default_password = 'Password123';

?>


<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main class="login-page">
    <section class="login-container">
        <h2 class="login-title">Se connecter</h2>
        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Nom d'utilisateur..." required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Mot de passe..." required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-subscribe">Se connecter</button>
            </div>
        </form>
    </section>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

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
