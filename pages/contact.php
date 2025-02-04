<?php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/functions.php';
include_once '../includes/meta_config.php';
include_once '../includes/head.php';

$current_page = basename($_SERVER['PHP_SELF']);

// Message de statut
$status_message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $status_message = '<div class="success-message">Votre message a été envoyé avec succès !</div>';
    } else if ($_GET['status'] === 'error') {
        $status_message = '<div class="error-message">Une erreur est survenue. Veuillez réessayer.</div>';
    }
}
?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main>
    <div class="contact-container">
        <h1>Nous contacter</h1>
        <p>Contactez-nous et nous vous répondrons le plus rapidement possible !</p>

        <?php echo $status_message; ?>

        <form action="mail.php" method="POST">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" required placeholder="Votre nom">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required placeholder="votre@email.com">
            </div>

            <div class="form-group">
                <label for="subject">Objet</label>
                <input type="text" name="subject" id="subject" required placeholder="Sujet de votre message">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="10" required placeholder="Votre message..."></textarea>
            </div>

            <div class="form-actions">
                <input type="submit" value="Envoyer">
                <a href="../index.php"><input type="button" value="Annuler"></a>
            </div>
        </form>
    </div>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>