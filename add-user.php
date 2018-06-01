<?php 
session_start();
if ($_SESSION['rang'] != 3){
    header('Location: index.php');
    exit();
}

?>

<?php
include('include/head.php');
include('config/bdd.php');

$mdp = chaine_aleatoire(8);

if((!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']))) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
   
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
                "pass" => password_hash($mdp, PASSWORD_DEFAULT),
                "register_date" => $date,
                "rang" => '1',
                "phone" => $phone,
                "name" => $name
            );
            $sql = 'INSERT INTO users (email,password,register_date,rang,phone,name) VALUES (:email, :pass, :register_date, :rang, :phone, :name)';
            $req = $bdd->prepare($sql);
            $result = $req->execute($tab);
            
            header('Location: user-list.php');
            exit();
        } else $erreur = 'Un membre possède déjà cette e-mail.';
    } else $erreur = 'Au moins un des champs est vide.';

function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}

?>

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
                      <div class="card-body card-block">

                        <form action="" method="post" class="">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-user"></i></div>
                              <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                              <input type="phone" name="phone" placeholder="Tel" class="form-control">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                              <input type="text" name="pass" id="pass" value="<?php print($mdp) ?>" class="form-control">
                              <input type="button" id="copy" value="Copier" onclick="copier();" />
                            </div>
                          </div>
                          <script type="text/javascript">
                          function copy() {
                            var copyText = document.querySelector("#pass");
                            copyText.select();
                            document.execCommand("Copy");
                          }

                          document.querySelector("#copy").addEventListener("click", copy);
                          </script>
                          <center><div class="form-actions form-group">
                          <button type="submit" class="btn btn-success btn-sm">Submit</button></div></center>
                        </form>

                      </div>
                    </div>
                  </div>
</body>

<?php include('include/footer.php'); ?>