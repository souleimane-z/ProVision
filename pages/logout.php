<?php
require_once __DIR__ . '/../includes/config.php';
session_start();

$_SESSION = array();
session_destroy();

header("Location: " . BASE_URL . "index.php");
exit;