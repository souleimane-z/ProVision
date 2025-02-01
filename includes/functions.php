<?php
session_start();
require_once __DIR__ . '/../config/database.php';
/* Affichage dynamique de l'option de se connecter / s'inscrire ou bien se déconnecter */

function displayAuthButtons($isLoggedIn, $logout_icon) {
    if (!is_logged_in()) {
        echo '<div class="header-auth">
                <button class="btn-login" title="Se connecter">
                    <a href="' . BASE_URL . 'pages/login.php">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </button>
                <button class="btn-signup" title="S\'inscrire">
                    <a href="' . BASE_URL . 'pages/register.php">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </button>
              </div>';
    } else {
        $username = get_logged_user();
        echo '<div class="header-auth">
                <span>Bonjour, ' . $username . '</span>
                <button class="btn-login" title="Se déconnecter">
                    <a href="' . BASE_URL . 'pages/logout.php">
                        ' . $logout_icon . '
                    </a>
                </button>
             </div>';
    }
}

// Reste des fonctions inchangé...
function register_user($username, $email, $password) {
    try {
        $db = getDBConnection();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($query);

        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ]);
    } catch(PDOException $e) {
        error_log("Erreur d'inscription : " . $e->getMessage());
        return false;
    }
}

function verify_login($username, $password) {
    try {
        $db = getDBConnection();

        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $db->prepare($query);
        $stmt->execute(['username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Debug
        error_log("Login attempt - Username: " . $username);
        error_log("User found in DB: " . ($user ? 'yes' : 'no'));
        if ($user) {
            error_log("Password verification: " . (password_verify($password, $user['password']) ? 'success' : 'failed'));
        }

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }

        return false;
    } catch(PDOException $e) {
        error_log("Erreur de connexion : " . $e->getMessage());
        return false;
    }
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function get_logged_user() {
    return $_SESSION['username'] ?? null;
}

?>