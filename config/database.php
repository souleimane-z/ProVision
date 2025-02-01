<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');     // Votre utilisateur MySQL
define('DB_PASS', '');         // Votre mot de passe MySQL
define('DB_NAME', 'provision');

function getDBConnection()
{
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $db = new PDO($dsn, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        error_log("Erreur de connexion : " . $e->getMessage());
        return null;
    }
}