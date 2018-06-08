<?php
include('config/bdd.php');
session_start(); // Obligatoirement avant tout `echo`, `print` ou autre texte HTML.
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

include('include/head.php');

require 'init.php';

$error = '';
$success = '';
if ($_POST) {

  \Stripe\Stripe::setApiKey("sk_test_boJmYeMIIn22Q5Sotzk23Pmq");

  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");

      $token = $_POST['stripeToken'];
      $amount = $_POST['amount'].'00';

      $charge = \Stripe\Charge::create([
          'amount' => $amount,
          'currency' => 'eur',
          'description' => 'Example charge',
          'source' => $token,
      ]);
    $sql2 = 'SELECT * from users WHERE id =?';
    $req2 = $bdd->prepare($sql2);
    $req2->execute(array($_SESSION['login']));
    while($row2 = $req2->fetch()) {
        $sql = 'UPDATE users SET credit = ? WHERE id =?';
        $req = $bdd->prepare($sql);
        $req->execute(array($row2['credit'] + ($amount / 100) , $_SESSION['login']));
    }
        $success = '<div class="card">
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success ! </h4>
                        <p>Votre crédit à été recharger</p>
                    <hr>
                </div>
            </div>';
  }
  catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Stripe Getting Started Form</title>
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">
            // this identifies your website in the createToken call below
            Stripe.setPublishableKey('pk_test_P0PLVruVETwr0GZ58E4bnufa');
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    form$.get(0).submit();
                }
            }
            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    return false; // submit from callback
                });
            });
        </script>
    </head>

<body>

<?php include('include/leftsidebar.php'); ?>

<?php include('include/header.php'); ?>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Recharger votre crédit</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php

        echo $success;

        ?>

        <form action="recharger.php" method="POST" id="payment-form">
            <div class="col-lg-12">
                <div class="card">
                      <div class="card-body card-block">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" size="20" placeholder="Card number" class="card-number form-control" />
                                </div>
                            </div>                          
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>   
                                        <input type="text" size="4" placeholder="CVV" class="card-cvc form-control" />
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>    
                                        <input type="text" size="2" placeholder="Month" class="card-expiry-month form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div> 
                                        <input type="text" size="2" placeholder="Year" class="card-expiry-year form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-eur"></i></div>
                                <input type="text" placeholder="Montant" name="amount" class="form-control" />
                                </div>
                            </div>
                            <center><div class="form-actions form-group">
                            <button type="submit" class="submit-button">Submit Payment</button></div></center>
                    </div>
                </div>
            </div>
        </form>
    </body>

<?php include('include/footer.php'); ?>

</html>