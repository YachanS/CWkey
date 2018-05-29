<?php
try
{
$user = "root";
$pass = "root";
$bdd = new PDO('mysql:host=localhost;dbname=cwkeytest', $user, $pass);
}
catch (Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : ' . $e->getMessage());
}
?>
