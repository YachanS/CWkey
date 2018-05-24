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
                        <h1>Add user</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">Add user</div>
                      <div class="card-body card-block">

                        <form action="" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                              <input type="tel" id="tel" name="tel" placeholder="Tel" class="form-control">
                            </div>
                          </div>
                          <center><div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div></center>
                        </form>

                      </div>
                    </div>
                  </div>
</body>

<?php include('include/footer.php'); ?>