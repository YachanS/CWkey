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
                        <h1>Reservation</h1>
                    </div>
                </div>
            </div>
        </div>

<?php

if((!empty($_POST['libelle']) && !empty($_POST['dateDeb']) && !empty($_POST['dateFin']) && !empty($_POST['salle']) && !empty($_POST['cowo']))){

$data = array(
            "libelle" => $libelle, 
            "dateDeb" => $dateDeb,
            "dateFin" => $dateFin,
            "salle" => $salle,
            "cowo" => $cowo,
            "user" => $user,
            );

    $sql = "INSERT INTO reservation (libelle,dateDeb,dateFin,idSalle,id_user,id_coworking) VALUES (:libelle, :dateDeb, :dateFin, :salle, :user, :cowo)";
    $req = $bdd->prepare($sql);
    $result = $req->execute(array($data));

            echo ' <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Success !</h4>
                                            <p>Votre reservation : </p>
                                            <hr>
                                            <p class="mb-0">du : ' .$dateDeb. '</p>
                                        </div>
                                    </div>
                                </div> ' ;

}

?>

<form action="reservation.php" action="post">
    <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body card-block">

                            <form action="" method="post" class="">
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                  <input type="text" name="libelle" placeholder="Company name" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                  <input type="datetime-local" name="dateDeb" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                  <input type="datetime-local" name="dateFin" class="form-control">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                  <input list="salle" id="" name="salle" placeholder="salle" class="form-control"/>
                                    <datalist id="salle" name="cowo">
                                        <?php
                                            $sql = 'SELECT * FROM salle' ;
                                            $req = $bdd->prepare($sql);
                                            $req->execute();
                                            while($row = $req->fetch()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['libelle'] . '</option>';
                                            }    
                                        ?>
                                    </datalist>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="input-group">
                                  <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                  <input list="cowo" name="cowo" placeholder="coworking" class="form-control"/>
                                    <datalist id="cowo" name="cowo">
                                        <?php
                                            $sql = 'SELECT * FROM coworking' ;
                                            $req = $bdd->prepare($sql);
                                            $req->execute();
                                            while($row = $req->fetch()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['libelle'] . '</option>';
                                            }    
                                        ?>
                                    </datalist>
                                </div>
                              </div>
                              <center><div class="form-actions form-group">
                              <button type="submit" class="btn btn-success btn-sm">Submit</button></div></center>
                          </div>
                        </div>
                      </div>

</form>

</body>

<?php include('include/footer.php'); ?>