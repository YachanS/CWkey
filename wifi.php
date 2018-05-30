<?php
include('config/bdd.php');
session_start();
if ($_SESSION['rang'] != 3){
    header('Location: index.php');
    exit();
}

?>

<?php include('include/head.php'); ?>

<body>
        <!-- Left Panel -->

<?php include('include/leftsidebar.php'); ?>

        <!-- Right Panel -->

<?php include('include/header.php'); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add wifi password</h1>
                    </div>
                </div>
            </div>
        </div>

<?php

if((!empty($_POST['user']) && !empty($_POST['wifi']))){

    $wifi = $_POST['wifi'];
    $user = $_POST['user'];
    $mdp = chaine_aleatoire(8);

$data = array(
            "wifi" => $wifi, 
            "user" => $user,
            "mdp" => password_hash($mdp, PASSWORD_DEFAULT),
            );

    $req = $bdd->prepare("INSERT INTO wifi_user (id_wifi,id_user,mdp) VALUES (:wifi, :user, :mdp)");
    $result = $req->execute($data);



            echo ' <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Success !</h4>
                                            <p>The password is : </p>
                                            <hr>
                                            <p class="mb-0">'.$mdp.'</p>
                                        </div>
                                    </div>
                                </div> ' ;
}


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

<form action="wifi.php" method="post">
    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">User</strong>
            </div>
                <div class="card-body">
                <input list="user" id="" name="user" class="col-lg-12"/>
                    <datalist id="user" name="user">
                        <?php
                        $sql = 'SELECT * FROM users' ;
                        $req = $bdd->prepare($sql);
                        $req->execute();
                        while($row = $req->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }    
                        ?>
                    </datalist>
                </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">wifi</strong>
            </div>
            <div class="card-body">
                <input list="wifi" id="" name="wifi" class="col-lg-12"/>
                    <datalist id="wifi" name="wifi">
                        <?php
                        $sql = 'SELECT * FROM wifi';
                        $req = $bdd->prepare($sql);
                        $req->execute();
                        while($row = $req->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . $row['libelle'] . '</option>';
                        }    
                        ?>
                    </datalist>
            </div>
        </div>
    </div>
                           
    <div class="form-actions form-group">
        <center>
            <button type="submit" class="btn btn-success btn-sm" style="position: relative; right:;">Create</button>
        </center>
    </div>
</form>

</body>

<?php include('include/footer.php'); ?>