<?php

include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/functions.php';


$errors = [];
$success = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);


    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format du mail est invalide.";
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
        $errors[] = "Au moins 8 caractères avec une majuscule et un chiffre.";
    } elseif ($password !== $confirm_password) {
        $errors[] = "les mots de passe ne correspondent pas.";
    } else {
        if (register_user($username, $email, $password)) {
            $success = "Inscription validé! Vous pouvez maintenant vous <a href='./login.php' id='success-message_login'>connecter</a>.";
        } else {
            $errors[] = "Une erreur dans l'inscription. Veuillez rééessayer.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire | ProVision</title>
    <link rel="stylesheet" href="./forms.css">

</head>
<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main class="register-page">
    <section class="register-container">
        <h2 class="register-title">Créer un compte</h2>
        <?php if (!empty($errors)): ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success-message">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST" class="register-form">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required
                       pattern="^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$"
                       title="Au moins 8 caractères avec une majuscule et un chiffre.">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-subscribe">Nous rejoindre</button>
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
