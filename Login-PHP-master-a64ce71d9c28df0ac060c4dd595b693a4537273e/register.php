<?php
include('config/bdd.php');

if((!empty($_POST['email']) && !empty($_POST['pass']))) {
	$email = htmlentities($_POST['email']);
	$pass = htmlentities($_POST['pass']);
	$pass2 = htmlentities($_POST['pass2']);
	if($pass != $pass2) $erreur = 'Les 2 mots de passe sont différents.';
	else {

		// DEBUGAGE
		// echo $_POST['email'];
		// echo $_POST['pass'];
		
		$sql = 'SELECT COUNT(*) FROM users WHERE email = ?';
		$req = $bdd->prepare($sql);
		$req->execute(array($email));
		while($row = $req->fetchColumn()) {
			$nb = $row;
		}
		
		/** on recherche si ce login est déjà utilisé par un autre membre */
		$date = date("Y-m-d");
		if($nb == 0) {
			$tab = array(
				"email" => $email,
				"pass" => password_hash($pass, PASSWORD_DEFAULT),
				"register_date" => $date,
				"rang" => '3'
			);
			$sql = 'INSERT INTO users (email,password,register_date,rang) VALUES (:email, :pass, :register_date, :rang)';
			$req = $bdd->prepare($sql);
			$result = $req->execute($tab);
			
			header('Location: login.php');
			exit();
		} else $erreur = 'Un membre possède déjà ce login.';
	}
} else $erreur = 'Au moins un des champs est vide.';
?>

<form action="register.php" method="post">
	<div>
		<label for="courriel">Email :</label>
		<input type="email" id="email" name="email">
	</div>
	<div>
		<label for="courriel">Mot de passe :</label>
		<input type="password" id="pass" name="pass">
	</div>
	<div>
		<label for="courriel">Mot de passe de confirmation :</label>
		<input type="password" id="pass2" name="pass2">
	</div>
	<div class="button">
		<button type="submit">Valider</button>
	</div>
</form>
