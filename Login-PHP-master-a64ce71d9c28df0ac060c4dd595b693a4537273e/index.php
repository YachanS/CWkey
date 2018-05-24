<?php
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
ini_set('session.gc_maxlifetime', 3600); // augmentation du temps de la validité de la session

/**
 * VOTRE PAGE PROTÉGÉE PAR UN LOGIN
 * SE TROUVE SOUS CES INSTRUCTIONS.
 */

echo 'Hello world.';
?>
