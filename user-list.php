<?php 
session_start();
if ($_SESSION['rang'] = 1){
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
                        <div class="card-header">
                            <strong class="card-title">Users list</strong>
                        </div>
                        <div class="card-body">
                  <table id="user-list" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tiger</td>
                        <td>Nixon</td>
                        <td>TN@gmail.com</td>
                        <td>061122334455</td>
                      </tr>
                    </tbody>
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