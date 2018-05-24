<?php include('include/head.php'); ?>

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
                    <form>
                        <div class="form-group">
                            <label>Forget password ?</label>
                            <input type="phone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" class="form-control" placeholder="enter your phone number (example : 0611223344)">
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include('include/footer.php'); ?>