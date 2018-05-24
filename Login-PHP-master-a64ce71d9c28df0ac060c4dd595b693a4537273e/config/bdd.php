<?php
try
{
$user = "admin";
$pass = "root";
$bdd = new PDO('mysql:host=localhost;dbname=login', $user, $pass);
}
catch (Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : ' . $e->getMessage());
}
?>
