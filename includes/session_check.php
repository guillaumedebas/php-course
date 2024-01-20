<?php
session_start();
if (isset($_SESSION['LOGGED_USER'])) {
    $loggedUser = $_SESSION['LOGGED_USER'];
} elseif (isset($_COOKIE['LOGGED_USER'])) {
    $loggedUser = $_COOKIE['LOGGED_USER'];
}
?>