<?php 
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

include('include/head.php');
?>

<body>

<?php
include('include/leftsidebar.php'); 
include('include/header.php');
?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Profil</h1>
                    </div>
                </div>
            </div>
        </div>

<div class="col-md-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <div class="media-body">
                                            <h2 class="text-light display-6"><?php echo $_SESSION['name']  ?></h2>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-envelope-o"></i>
                                        <?php
                                        echo $_SESSION['email'];
                                        ?>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-phone"></i> Tel :
                                        <?php 
                                        echo $_SESSION['phone'];
                                        ?>
                                    </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-star"></i> Rang :
                                        <?php 
                                        echo $_SESSION['rang'];
                                        ?>
                                    </a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                    </div>

    <a href="modif-profil.php">
        <button type="button" class="btn btn-secondary" style="position: relative; left: 88%; color: #fff;">Modifier</button>
    </a>

</body>

<?php include('include/footer.php'); ?>