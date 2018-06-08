<?php 
include('config/bdd.php');
include('include/head.php'); 

session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

?>

<body>

<?php include('include/leftsidebar.php'); ?>


<?php include('include/header.php'); ?>



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Payment :</h1>
                    </div>
                </div>
            </div>
        </div>

<?php

$sql = 'SELECT * FROM reservation where idUser = ? order by idUser desc limit 1' ;
$req = $bdd->prepare($sql);
$req->execute(array($_SESSION['login'])); 

while($row = $req->fetch()) {

$sql2 = 'SELECT * FROM prix where idSalle = ?';
$req2 = $bdd->prepare($sql2);
$req2->execute(array($row['idSalle'])); 

while($row2 = $req2->fetch()) {


$date = $row['dateDeb'];
 
$tab = explode( ' ', $date );
 
list( $annee, $mois ,$jour,   ) = explode( '-', $tab[0] );

$search = 'T';
$replace = " à ";
$subject = $date;

$str1 = str_replace ($search , $replace , $subject);

$date = $row['dateFin'];
 
$tab = explode( ' ', $date );
 
list( $annee, $mois ,$jour,   ) = explode( '-', $tab[0] );

$search = 'T';
$replace = " à ";
$subject = $date;

$str2 = str_replace ($search , $replace , $subject);

$s = $row['dateDeb'];
$dt = new DateTime($s);

$date1 = $dt->format('Y-m-d');
$time = $dt->format('H:i:s');

$s = $row['dateFin'];
$dt = new DateTime($s);

$date2 = $dt->format('Y-m-d');
$time = $dt->format('H:i:s');

$date_courante = new DateTime($date2);
$date_reference = new DateTime($date1);
$interval = $date_courante->diff($date_reference);
$diff = $interval->format('%a');

if ($diff <= 1){
    $prix = $row2['prix'];
} else {
    $prix = $row2['prix'] * $diff;
}

}
}

$sql3 = 'UPDATE reservation SET paid = 1 WHERE idUser = ? order by idUser desc limit 1';
$req3 = $bdd->prepare($sql3);
$req3->execute(array($_SESSION['login']));

?>

<form action="successp.php" method="post">
<div class="card">
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Successfull payment : </h4>
                        <p>Click below to ask for a facture</p>
                    <hr>
                    <div><button type="submit" name="" class="submit-button">Here !</button></div>
                    <input type="hidden" name="check" value="1">
                </div>
            </div>
        </div>
</form>

<?php

if (!empty($_POST['check'])){
    
$numtel = '0644859129';
$key = "TOZhlHUPBh13OP6jDUfunlGJaQV9F2QaFWGTxdCV";

$sql = 'SELECT * FROM users WHERE id = ?' ;
$req = $bdd->prepare($sql);
$req->execute(array($_SESSION['login']));
while($row = $req->fetch()) {


$sms2="http://hexicans.eu/api/index.php?tel=".$numtel."&key=".$key."&msg=";

$message = "L'utilisateur " . $row['id'] . " réclame une facture";
$sms =urlencode($message);
$sms = $sms2 . $sms;

// Cr?ation d'une nouvelle ressource cURL
$ch = curl_init();

// Configuration de l'URL et d'autres options
curl_setopt($ch, CURLOPT_URL, $sms);
curl_setopt($ch, CURLOPT_HEADER, 0);

// R?cup?ration de l'URL et affichage sur le naviguateur
curl_exec($ch);

// Fermeture de la session cURL
curl_close($ch);

}
} 

?>

</body>

<?php include('include/footer.php'); ?>