<?php
include('include/head.php');
include('config/bdd.php');

if((!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['pass']))) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $pass = htmlentities($_POST['pass']);
    $pass2 = htmlentities($_POST['pass2']);
    if($pass != $pass2) {

    	$erreur = 'Les 2 mots de passe sont différents.';

    }
    else{
   
        // DEBUGAGE
        // echo $_POST['email'];
        // echo $_POST['pass'];
        
        $sql = 'SELECT COUNT(*) FROM users WHERE email = ?';
        $req = $bdd->prepare($sql);
        $req->execute(array($email));
        while($row = $req->fetchColumn()) {
            $nb = $row;
        }
        /** on recherche si l'e-mail est déjà utilisé par un autre membre */
        $date = date("Y-m-d");
        if($nb == 0) {
            $tab = array(
                "email" => $email,
                "pass" => password_hash($pass, PASSWORD_DEFAULT),
                "register_date" => $date,
                "rang" => '1',
                "phone" => $phone,
                "name" => $name
            );
            $sql = 'INSERT INTO users (email,password,register_date,rang,phone,name) VALUES (:email, :pass, :register_date, :rang, :phone, :name)';
            $req = $bdd->prepare($sql);
            $result = $req->execute($tab);
            
            header('Location: login.php');
            exit();
        } else $erreur = 'Un membre possède déjà cette e-mail.';
    }
} else $erreur = 'Au moins un des champs est vide.';
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
                    <form action="page-register.php" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="name" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Re password</label>
                            <input type="password" name="pass2" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include('include/footer.php'); ?>