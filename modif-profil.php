<?php
session_start();
?>

<?php include('include/head.php'); ?>

<body>

<?php include('include/leftsidebar.php'); ?>

        <!-- Right Panel -->

<?php include('include/header.php'); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Modify profil</h1>
                    </div>
                </div>
            </div>
        </div>

<div class="col-lg-12">
    <form action="" method="post" class="form-horizontal">
        <div class="card">
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="hf-email" name="hf-email" placeholder=<?php echo $_SESSION['name'] ?> class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="hf-email" name="hf-email" placeholder=<?php echo $_SESSION['email'] ?> class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="pohne" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="hf-password" name="hf-password" placeholder=<?php echo $_SESSION['phone'] ?> class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="password" id="hf-password" name="hf-password" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Re Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="hf-password" name="hf-password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
        </div>
    </form>
</div>

</body>

<?php include('include/footer.php'); ?>