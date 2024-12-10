<?php

/* Affichage dynamique de l'option de se connecter / s'inscrire ou bien se déconnecter */
function displayAuthButtons($isLoggedIn, $logout_icon) {

    if (!is_logged_in()) {
        echo '<div class="header-auth">
                <button class="btn-login" title="Se connecter">
                    <a href="/pages/login.php">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    </a>
                </button>
                <button class="btn-signup" title="S\'inscrire">
                    <a href="/pages/register.php">
                        <i class="fa-solid fa-user-plus"></i>
                    </a>
                </button>
              </div>';
    } else {
        $username = get_logged_user();
        echo    '<div class="header-auth">
                    <span>Bonjour, '.$username.'</span>
                    <button class="btn-login" title="Se déconnecter">
                        <a href="/pages/logout.php">
                            '.$logout_icon.'
                        </a>
                    </button>
                </div>';
    }
}
// LOGIN & REGISTER
function register_user($username, $email, $password) {
    try {
        $user = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        setcookie(
            'user_data',
            json_encode($user),
            time() + (86400 * 30),
            '/'
        );

        return true;
    } catch (Exception $e) {
        return false;
    }
}

function verify_login($username, $password) {

    if (!isset($_COOKIE['user_data'])) {
        return false;
    }

    $user = json_decode($_COOKIE['user_data'], true);

    if ($user['username'] === $username &&
        password_verify($password, $user['password'])) {
        return true;
    }

    return false;
}
function is_logged_in() {
    return isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] === 'true';
}

function get_logged_user() {
    return isset($_COOKIE['current_user']) ? $_COOKIE['current_user'] : null;
}
?>