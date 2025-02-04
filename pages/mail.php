<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    try {
        $db = getDBConnection();

        $query = "INSERT INTO contact_messages (name, email, subject, message) 
                  VALUES (:name, :email, :subject, :message)";

        $stmt = $db->prepare($query);

        $success = $stmt->execute([
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ]);

        if ($success) {
            header("Location: " . BASE_URL . "pages/contact.php?status=success");
            exit();
        } else {
            header("Location: " . BASE_URL . "pages/contact.php?status=error");
            exit();
        }
    } catch(PDOException $e) {
        error_log("Erreur d'enregistrement du message : " . $e->getMessage());
        header("Location: " . BASE_URL . "pages/contact.php?status=error");
        exit();
    }
} else {
    header("Location: " . BASE_URL . "pages/contact.php");
    exit();
}
?>