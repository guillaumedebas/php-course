<?php
session_start();
session_destroy();
header('Location: ../recettes.php');
setcookie(
    'LOGGED_USER',
    $user['email'],
    time() - 86400,
    '/',
    '',
    isset($_SERVER["HTTPS"]),
    true
);
exit();
