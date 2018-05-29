 <?php
include('config/bdd.php');
include('include/head.php');

session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(isset($_SESSION['login'])) {
    header('Location: index.php');
    exit();
}

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
    $sql = 'SELECT COUNT(*) FROM users WHERE email = ?';
    $req = $bdd->prepare($sql);
    $req->execute(array($_POST['email']));

    while($row = $req->fetchColumn()) {
        $nb = $row;
    }

    if($nb == 0) {
        echo 'Utilisateur incorrect !';
    }
    else {
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($_POST['email']));
        //die(password_hash($_POST['pass'], PASSWORD_DEFAULT));

        while($row = $req->fetch()) {
            if(password_verify($_POST['pass'], $row['password'])) {
                session_start();
                $_SESSION['rang'] = $row['rang'];
                $_SESSION['login'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                header('Location: index.php');
                exit();
            } else {
                $erreur = 'Mot de passe incorrect !';
                echo $erreur;
            }
        }
    }
}

?>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo2.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="pages-forget.php">Forgotten Password ?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="page-register.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<?php include('include/footer.php'); ?>