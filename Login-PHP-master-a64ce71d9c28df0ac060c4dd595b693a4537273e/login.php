<?php
include('config/bdd.php');
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
	$sql = 'SELECT COUNT(*) FROM users WHERE email = ?';
	$req = $bdd->prepare($sql);
	$req->execute(array($_POST['email']));

	while($row = $req->fetchColumn()) {
		$nb = $row;
	}

	if($nb == 0) echo 'Utilisateur incorrect !';
	else {
		$req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
		$req->execute(array($_POST['email']));
		//die(password_hash($_POST['pass'], PASSWORD_DEFAULT));

		while($row = $req->fetch()) {
			if(password_verify($_POST['pass'], $row['password'])) {
				session_start();
				$_SESSION['login'] = $row['id'];
				header('Location: index.php');
				exit();
			} else {
				$erreur = 'Mot de passe incorrect !';
				echo $erreur;
			}
		}
	}
}
?>

<form action="login.php" method="post">
	<div>
		<label for="courriel">Email :</label>
		<input type="email" id="email" name="email">
	</div>
	<div>
		<label for="courriel">Mot de passe :</label>
		<input type="password" id="pass" name="pass">
	</div>
	<div class="button">
		<button type="submit">Valider</button>
	</div>
</form>
