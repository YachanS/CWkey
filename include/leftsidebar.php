    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar"></i>Reservation</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-calendar-o"></i><a href="calendrier.php">Calendrier</a></li>
                            <li><i class="fa fa-calendar-o"></i><a href="reservation.php">Reserver</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Compte</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus-circle"></i><a href="recharger.php">Recharger crédit</a></li>
                        </ul>
                    </li>
                    	

<?php if($_SESSION['rang'] == 3){ ?>

                    <h3 class="menu-title">Admin</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="add-user.php">Add users</a></li>
                            <li><i class="fa fa-rss"></i><a href="wifi.php">Add wifi password</a></li>
                            <li><i class="fa fa-list"></i><a href="user-list.php">Users list</a></li>
                        </ul>
                    </li>

<?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </aside><!-- /#left-panel -->