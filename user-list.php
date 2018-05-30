<?php 
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
                        <h1>User list</h1>
                    </div>
                </div>
            </div>
        </div>

	<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                <?php
                if($_GET['del'] == "true"){
              
              $sql = 'DELETE FROM users WHERE id = ?';    
              $req = $bdd->prepare($sql);
              $req->execute(array($_GET['id']));
              header("Location: user-list.php");

                }
                $sql = 'SELECT * FROM users' ;
                $req = $bdd->prepare($sql);
                $req->execute();
                ?>
                  <table id="user-list" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                        <th>Rang</th>
                        <th>delete</th>
                      </tr>
                    </thead>
                    <?php
                    while($row = $req->fetch()) {
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php if($row['rang'] == 1){ echo'utilisateur'; } else {echo'administrateur';} ?></td>
                        <td><center><a href="user-list.php?del=true&id=<?php echo $row['id']; ?>"><img src="images/del.png" /></a></center></td>
                      </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
</body>

<?php include('include/footer.php'); ?>