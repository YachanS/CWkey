<?php include('include/head.php'); 

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
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

    <?php
        $sql = 'SELECT * FROM coworking' ;
        $req = $bdd->prepare($sql);
        $req->execute();
        while($row = $req->fetch()){
        $sql2 = 'SELECT * FROM wifi_user where id_user = ? AND id_coworking = ?' ;
        $req2 = $bdd->prepare($sql2);
        $req2->execute(array($_SESSION['login'],$row['id']));
        while($row2 = $req2->fetch()){
        $sql3 = 'SELECT * FROM wifi where id = ?' ;
        $req3 = $bdd->prepare($sql3);
        $req3->execute(array($row2['id_wifi']));
        while($row3 = $req3->fetch()){    
    ?>    


	<div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3"><?php echo $row['libelle']; ?></h4>
                                    <p class="card-text">Utilisateur : <?php echo $_SESSION['name']; ?> </br>Mot de passe : <?php echo $row2['mdp']; ?></br>Wifi : <?php echo $row3['libelle']; ?></p>
                            </div>
                        </div>
                    </div>
    <?php
                } 
            }
        }
    ?>
</body>

<?php include('include/footer.php'); ?>