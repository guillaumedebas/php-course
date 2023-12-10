<?php
session_start();
session_destroy();
header('Location: ../recettes.php');
exit();
?>
