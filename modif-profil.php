<?php
include('include/head.php'); 
include('config/bdd.php');

session_start();
if ($_POST['sub'] == "sub"){

if (!empty($_POST['name'])){
    $sql = 'UPDATE users SET name = ? WHERE id =?';
    $req = $bdd->prepare($sql);
    $req->execute(array($_POST['name'] , $_SESSION['login']));
}
if (!empty($_POST['email'])){
    $sql = 'UPDATE users SET email = ? WHERE id =?';
    $req = $bdd->prepare($sql);
    $req->execute(array($_POST['email'] , $_SESSION['login']));
}
if (!empty($_POST['phone'])){
    $sql = 'UPDATE users SET phone = ? WHERE id =?';
    $req = $bdd->prepare($sql);
    $req->execute(array($_POST['phone'] , $_SESSION['login']));
}
if (!empty($_POST['pass']) && !empty($_POST['pass2'])) {
    
    if ($_POST['pass'] == $_POST['pass2']) {
        $sql = 'UPDATE users SET password = ? WHERE id =?';
        $req = $bdd->prepare($sql);
        $req->execute(array(password_hash($_POST['pass'] , PASSWORD_DEFAULT) , $_SESSION['login']));
    }  
}
header("Location: profil.php");
}
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
    <form action="modif-profil.php" method="post" class="form-horizontal">
        <div class="card">
            <div class="card-body card-block">
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class="form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="name" placeholder="<?php echo $_SESSION['name'] ?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" name="email" placeholder="<?php echo $_SESSION['email'] ?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="pohne" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" placeholder="<?php echo $_SESSION['phone'] ?>" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9"><input type="password" name="pass" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hf-password" class=" form-control-label">Re Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="pass2" class="form-control">

                         <input type="text" hidden="hidden" name="sub" class="form-control" value="sub">
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