<?php

setcookie('logged_in', '', time() - 3600, '/');
setcookie('current_user', '', time() - 3600, '/');
setcookie('user_data', '', time() - 3600, '/');


header("Location: /../index.php");
exit;
?>