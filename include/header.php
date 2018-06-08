<?php include('config/bdd.php'); ?>

<?php

$sql = 'SELECT * FROM users where id = ?' ;
$req = $bdd->prepare($sql);
$req->execute(array($_SESSION['login'])); 

while($row = $req->fetch()) {

$credit = $row['credit'];

}

?>

<div id="right-panel" class="right-panel">
<!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-hand-o-left"></i></a>
                    <div class="header-left">
                    <a>Crédit : <span class="badge badge-primary"><?php echo $credit ?> €</span></a>    
                    </div>
                </div>


                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">

                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="profil.php"><i class="fa fa- user"></i> My Profile</a>

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->