            <?php session_start();
            header("Cache-Control: public, max-age=" . 604800);
            ?>

            <!DOCTYPE html>
            <html lang="de">
            <head>
                <link rel="apple-touch-icon" sizes="180x180" href="/img/icon/apple-touch-icon.png">
                <link rel="icon" type="image/png" sizes="32x32" href="/img/icon/favicon-32x32.png">
                <link rel="icon" type="image/png" sizes="194x194" href="/img/icon/favicon-194x194.png">
                <link rel="icon" type="image/png" sizes="192x192" href="/img/icon/android-chrome-192x192.png">
                <link rel="icon" type="image/png" sizes="16x16" href="/img/icon/favicon-16x16.png">
                <link rel="mask-icon" href="/img/icon/safari-pinned-tab.svg" color="#5bbad5">
                <link rel="shortcut icon" href="/img/icon/favicon.ico">
                <meta name="apple-mobile-web-app-title" content="BKR-LIS">
                <meta name="application-name" content="BKR-LIS">
                <meta name="msapplication-TileColor" content="#3c3c3c">
                <meta name="msapplication-TileImage" content="/img/icon/mstile-144x144.png">
                <meta name="msapplication-config" content="/img/icon/browserconfig.xml">
                <meta name="theme-color" content="#3e3e3e">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <link rel="manifest" href="manifest.json">
                <link href="/CSS/all.min.css" rel="stylesheet">
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes" name="viewport">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic&display=swap">
                <link rel="canonical" href="https://localhost/bkr-lis/"/>

                <link rel="stylesheet" href="CSS/adminlte.min.css">
                <link rel="stylesheet" href="CSS/bootstrap-table.min.css">
                <link rel="stylesheet" href="CSS/install.css">
                <title>BKR-LIS</title>
                <script src="SW.js"></script>
                <script src="JS/InstallScript.js"></script>

            </head>

            <body class="hold-transition skin-black fixed sidebar-mini">
            <div class="wrapper">


                <!-- Header Navbar -->
                <nav class="main-header navbar navbar-expand navbar-gray-dark navbar-dark" role="navigation">

                    <!-- Sidebar toggle button-->
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- Navbar Right Menu -->
                    <ul class="navbar-nav ml-auto">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <?php
                            if (isset($_SESSION['loggedin'])){ //show notifications,profile and logout link if logged in, else show login and register buttons in dropdown
                                echo"<li class='nav-item dropdown'> 
                    <a class='nav-link user user-menu' style='padding-right:5rem' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >
                        <img src='/img/account-icon.png' class='user-image' height='30' width='30' style='border-radius:30px;margin-top:0px' alt=''> BKR User </a> 
                    <div class='dropdown-menu bg-gray-dark' aria-labelledby='AccountMenu'>
                        <a class='dropdown-item' href='Profile.php'><i class='fas fa-user-circle'></i>  Profile</a>
                        <a class='dropdown-item' href='Logout.php'><i class='fas fa-user-circle'></i>  Sign Out</a> </li>
            </div>";
                            }else{
                                echo"<li class='nav-item dropdown'> 
                         <a class='nav-link dropdown-toggle' style='padding-right:5rem' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' ><i class='fas fa-user-circle user-image'></i> Guest </a>
                            <div class='dropdown-menu dark' aria-labelledby='AccountMenu'>
                                <a class='dropdown-item' href='login.php'>
                                    <i class='fas fa-user-circle'></i>  Log in</a>
                                <a class='dropdown-item' href='register.php'>
                                    <i class='fas fa-user-circle'></i>  Register</a> </li>";}
                            ?>
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

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    View
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="KollegiumAnzeigen.php" class="nav-link">
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
                        </li>
                    </ul>
                    <!-- Optionally, you can add icons to the links -->
                    <?php
                    if (isset($_SESSION['loggedin'])&&($_SESSION['loggedin'])==TRUE){
                        echo'   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-pencil-ruler"></i>
                            <p>
                                Edit
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
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
                            </li>
                        </ul>
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
                    <!-- USER CONTENT HERE!-->
                    <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
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
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="JS/adminlte.min.js"></script>
    </body>
   </html>
