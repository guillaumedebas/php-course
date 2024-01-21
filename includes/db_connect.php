<?php
try {
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=we_love_food;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
 