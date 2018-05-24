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

    <form action="" method="post" class="">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
        <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Select user</strong>
                            </div>
                            <div class="card-body">
                                  <select data-placeholder="Choose a user" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <option value="United States">Aurelien</option>
                                    <option value="United Kingdom">Mathieu</option>
                                </select>
                            </div>
                        </div>
        </div>
        <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Select wifi</strong>
                            </div>
                            <div class="card-body">
                                  <select data-placeholder="Choose a user" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <option value="United States">OpenSpace</option>
                                    <option value="United Kingdom">Reunion</option>
                                </select>
                            </div>
                        </div>
        </div>
                <div class="form-actions form-group">
                    <center>
                        <button type="submit" class="btn btn-success btn-sm" style="position: relative; right:0%;">Create</button>
                    </center>
                </div>
                </div>
            </div>
        </div>
    </form>

</body>

<?php include('include/footer.php'); ?>