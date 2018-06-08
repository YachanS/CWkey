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
if ($_POST) {

  \Stripe\Stripe::setApiKey("");

  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");

      $token = $_POST['stripeToken'];

$sql4 = 'SELECT * FROM invoice where idUser = ? order by idUser desc limit 1' ;
$req4 = $bdd->prepare($sql4);
$req4->execute(array($_SESSION['login'])); 

while($row4 = $req4->fetch()) {
      
      $amount = $row4['montant'];

  }

      $charge = \Stripe\Charge::create([
          'amount' => $amount,
          'currency' => 'eur',
          'description' => 'Example charge',
          'source' => $token,
      ]);
    header('Location: successp.php');
  }
  catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Stripe Getting Started Form</title>
        <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">
            // this identifies your website in the createToken call below
            Stripe.setPublishableKey('');
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
                        <h1>Payment : </h1>
                    </div>
                </div>
            </div>
        </div>

        <form action="paiement.php" method="POST" id="payment-form">
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
                            <center><div class="form-actions form-group">
                            <button type="submit" class="submit-button">Submit Payment</button></div></center>
                    </div>
                </div>
            </div>
        </form>
    </body>

<?php include('include/footer.php'); ?>