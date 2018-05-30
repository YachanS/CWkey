<?php
include('include/head.php'); 
include('config/bdd.php');

if(!empty($_POST['phone'])){

$numtel = $_POST['phone'];
$key = "TOZhlHUPBh13OP6jDUfunlGJaQV9F2QaFWGTxdCV";
$mdp = chaine_aleatoire(8);

$sql = 'SELECT id FROM users WHERE phone = ?';
$req = $bdd->prepare($sql);
$req->execute(array($_POST['phone']));
while($row = $req->fetchColumn()) {
            $id = $row['id'];
        }

$sql = 'UPDATE users SET password = ? WHERE id =?';
$req = $bdd->prepare($sql);
$req->execute(array(password_hash($mdp, PASSWORD_DEFAULT),$id));

$sms2="http://hexicans.eu/api/index.php?tel=".$numtel."&key=".$key."&msg=";

$message = "Votre mot de passe provisoire est : " . $mdp;
$sms =urlencode($message);
$sms = $sms2 . $sms;

// Cr�ation d'une nouvelle ressource cURL
$ch = curl_init();

// Configuration de l'URL et d'autres options
curl_setopt($ch, CURLOPT_URL, $sms);
curl_setopt($ch, CURLOPT_HEADER, 0);

// R�cup�ration de l'URL et affichage sur le naviguateur
curl_exec($ch);

// Fermeture de la session cURL
curl_close($ch);
}

// Génération d'une chaine aléatoire
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

?>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo2.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="pages-forget.php" method="post">
                        <div class="form-group">
                            <label>Forget password ?</label>
                            <input type="phone" name="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" placeholder="enter your phone number (example : 0611223344)">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include('include/footer.php'); ?>