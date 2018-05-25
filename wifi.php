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

<form>
    <div class="col-xs-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">User</strong>
            </div>
                <div class="card-body">
                    <input list="users" id="" name="" class="col-lg-12"/>
                        <datalist id="users">
                            <option value="">
                            <option value="Mathieu">
                            <option value="Aurélien">
                            <option value="Axel">
                            <option value="Yachan">
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
                <input list="wifi" id="" name="" class="col-lg-12"/>
                    <datalist id="wifi">
                        <option value="Openspace">
                        <option value="Reunion">
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

<div class="col-xs-12 col-sm-12">
    <div class="card-header">
        <div>
            <strong class="card-title">Contents</strong>
        </div>
        <div class="card-body">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Le mot de passe pour l'utilisateur "" pour le wifi "" est :</p><hr>
                <p class="mb-0">mot de passe</p>
            </div>
        </div>
    </div>
</div>

</body>

<?php include('include/footer.php'); ?>