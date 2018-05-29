<?php include('include/head.php'); 

session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

?>

<body>
        <!-- Left Panel -->

<?php include('include/leftsidebar.php'); ?>

        <!-- Right Panel -->

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


	<div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Captain OpenSpace</h4>
                                <p class="card-text">Utilisateur : lenumero1 </br>Mot de passe : jugtreppokj</p>
                            </div>
                        </div>
                    </div>
    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Captain Reunion</h4>
                                <p class="card-text">Utilisateur : lenumero1 </br>Mot de passe : 545311ffgc</p>
                            </div>
                        </div>
                    </div>
    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="images/placeholder.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-3">RJ45</h4>
                                <p class="card-text">Branchez vous a un réseau fiable et rapide</p>
                            </div>
                        </div>
                    </div>
</body>

<?php include('include/footer.php'); ?>