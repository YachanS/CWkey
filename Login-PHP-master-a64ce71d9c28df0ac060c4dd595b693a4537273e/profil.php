<?php
include('config/bdd.php');
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) { // si l'utilisateur n'est pas connecté, on redirige
    header('Location: index.php');
    exit();
}


if (!empty($_POST['email'])){
  $sql = 'UPDATE users SET email = ? WHERE id = ?';
  $req = $bdd->prepare($sql);
  $req->execute(array($_POST['email'],$_SESSION['login']));
  echo 'Email changé' ; // afficher sur le site que l'email bien été changé
}
if (!empty($_POST['pass'])){
  $sql = 'UPDATE users SET password = ? WHERE id = ?';
  $req = $bdd->prepare($sql);
  $req->execute(array(password_hash($_POST['pass'], PASSWORD_DEFAULT),$_SESSION['login']));
  echo 'Mot de passe changé'; // afficher sur le site que le mot de passe a bien été changé
}
?>






<form action="profil.php" method="post">
	<div>
		<label for="courriel">Nouvel Email :</label>
		<input type="email" id="email" name="email">
	</div>
	<div>
		<label for="courriel">Nouveau mot de passe :</label>
		<input type="password" id="pass" name="pass">
	</div>
	<div class="button">
		<button type="submit">Valider</button>
	</div>
</form>
