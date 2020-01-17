<?php session_start();?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="img/bkr_lis.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<link rel="stylesheet"href="CSS/adminlte.min.css">
    <link rel="stylesheet" href="CSS/bootstrap-table.min.css">
    <title>BKR-LIS</title>
    <script src="JS/jquery-3.4.1.slim.min.js"></script>
    <script src="JS/adminlte.min.js"></script>

</head>

<body class="hold-transition skin-black fixed sidebar-mini">
<div class="wrapper">


    <!-- Header Navbar -->
        <nav class="main-header navbar navbar-expand navbar-gray-dark navbar-dark" role="navigation">

            <!-- Sidebar toggle button-->
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- Navbar Right Menu -->
            <ul class="navbar-nav ml-auto">
               <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-widget="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="img/bkr_lis.ico" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">BKR-Admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <p>
                                    BKR-Admin
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar sidebar-dark-primary">
    <a href="index.php" class="brand-link">
        <img src="img/bkr_lis.ico" alt="AdminLTE Logo" class="brand-image img-fluid elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BKR-<b>LIS</b></span>
    </a>
        <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-header"><i class="nav-icon fas fa-eye"></i>   View</li>
                    <li class="nav-item">
                        <a href="KollegiumAnzeigen.php" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kollegium
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="AufgabenAnzeigen.php" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Aufgaben
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="KlassenAnzeigen.php" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Klassen
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="FakultasAnzeigen.php" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Fakultas
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ZKAnzeigen.php" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Zertifikatskurse
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
                <!-- Optionally, you can add icons to the links -->
                <?php
                if (isset($_SESSION['loggedin'])&&($_SESSION['loggedin'])==TRUE){
                    echo'   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-header"><i class="nav-icon fas fa-pen"></i>   Edit</li>
                    <li class="nav-item">
                        <a href="KollegiumBearbeiten.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kollegium
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="AufgabenBearbeiten.php" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Aufgaben
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="KlassenBearbeiten.php" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Klassen
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="FakultasBearbeiten.php" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Fakultas
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ZKBearbeiten.php" class="nav-link">
                            <i class="nav-icon fas fa-certificate"></i>
                            <p>
                                Zertifikatskurse
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>';
                }
                ?>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <h1 class="m-0 text-dark">
                Bitte Wählen sie aus der Sidebar gewünschte Informationen aus.
            </h1>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            BKR Lehrerinformationssystem
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2019/2020
            <a href="#">Julian "Juplay" Schüler @ BK Rheine</a>
            .</strong> All rights reserved.
    </footer>



            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg"></div>
</div>
</body>