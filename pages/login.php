<?php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/functions.php';
// valeurs par défault
$default_username = 'admin';
$default_password = 'Password123';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if ($username === $default_username && $password === $default_password) {
        header("Location: ../index.php");
        exit;
    } else {
        $errors[] = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter | ProVision</title>
    <link rel="stylesheet" href="./forms.css">

</head>
<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main class="login-page">
    <section class="login-container">
        <h2 class="login-title">Login</h2>
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
                <button type="submit" class="btn-subscribe">Login</button>
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
