<?php 
include('config/bdd.php');
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

?>

<?php
include('include/head.php'); 
?>

<body>

<?php include('include/leftsidebar.php'); ?>


<?php include('include/header.php'); ?>



<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Choix du moyen de paiement : </h1>
                    </div>
                </div>
            </div>
        </div>

<?php

$sql = 'SELECT * FROM reservation where idUser = ? order by idUser desc limit 1' ;
$req = $bdd->prepare($sql);
$req->execute(array($_SESSION['login'])); 

while($row = $req->fetch()) {

$sql2 = 'SELECT * FROM prix where idSalle = ?' ;
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

$data = array(
"montant" => $prix * 100,
"idUser" => $_SESSION['login']
);

$sql3 = 'INSERT INTO invoice (montant,idUser) VALUES (:montant, :idUser)';
$req3 = $bdd->prepare($sql3);  
$result = $req3->execute($data); 


echo '<div class="card">
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Votre reservation : </h4>
            <p>du : ' .$str1. ' au '.$str2.' ( ' .$diff.' jour(s) )</p>
            <hr>
            <p class="mb-0">Amount : ' .$prix. ' €</p>
        </div>
    </div>
</div> ';

}
}

$sql = 'SELECT * FROM users where id = ?' ;
$req = $bdd->prepare($sql);
$req->execute(array($_SESSION['login'])); 

while($row = $req->fetch()) {

$credit = $row['credit'];

?>

<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="paiement.php"><button type="button" class="btn btn-primary btn-block">Carte bancaire</button></a>
                            </div>
<form action="choixpaiement.php" method="post">
                            <div class="card-body">
                                    <a href=""><button type="submit" name="credit" class="btn btn-primary btn-block">Credit ( <?php echo $credit; ?> € )</button></a>
                            </div>
</form>
                        </div>
</div>;

<?php 

}

if(($prix <= $credit) && (isset($_POST['credit']))){
    $newcredit = $credit - $prix;
    $sql = 'UPDATE users SET credit = ? WHERE id =?';
    $req = $bdd->prepare($sql);
    $req->execute(array($newcredit , $_SESSION['login']));
    header('Location: index.php');
}


?>


</body>

<?php include('include/footer.php'); ?>