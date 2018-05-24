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
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </div>

<div class="col-md-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <div class="media-body">
                                            <h2 class="text-light display-6">Jim Doe</h2>
                                        </div>
                                    </div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-envelope-o"></i> Mail : jdcwkey@hotmail.fr</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#"> <i class="fa fa-phone"></i> Tel : 061122334455</a>
                                    </li>
                                </ul>

                            </section>
                        </aside>
                    </div>

    <a href="modif-profil.php">
        <button type="button" class="btn btn-secondary" style="position: relative; left: 88%; color: #fff;">Modifier</button>
    </a>

</body>

<?php include('include/footer.php'); ?>