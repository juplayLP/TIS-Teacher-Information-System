<aside class="main-sidebar sidebar-dark-primary">
    <a href="/index.php" class="brand-link">
        <img src="/img/TIS.ico" alt="AdminLTE Logo" class="brand-image img-fluid" style="opacity: .8">
        <span class="brand-text font-weight-light">BKR-<b>LIS</b></span>
    </a>
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
<?php
$view = array(
    0 => "ShowTeacher.php",
    1 => "ShowStaff.php",
    2 => "ShowTasks.php",
    3 => "ShowClasses.php",
    4 => "ShowFaculties.php",
    5 => "ShowCerts.php",
    6 => "ShowRanks.php",
);
foreach ($view as $item) {
    if (basename($_SERVER['PHP_SELF']) == $item) {
        echo ' <li class="nav-item has-treeview menu-open"> <a href="#" class="nav-link active">';
        break;
    } else {
        if ($item == $view[6]) {
            echo " <li class='nav-item has-treeview'> <a href='#' class='nav-link'>";
        }
    }
}
?>

                <i class="nav-icon fas fa-eye"></i>
                <p>
                    View
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/View/ShowTeacher.php"<?php if (basename($_SERVER['PHP_SELF']) == "ShowTeacher.php") { ?>
                           class="active nav-link"> <?php } else { ?> class="nav-link">  <?php } ?>
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Lehrer

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/View/ShowStaff.php"<?php if (basename($_SERVER['PHP_SELF']) == "ShowStaff.php") { ?>
                           class="active nav-link"> <?php } else { ?> class="nav-link">  <?php } ?>
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kollegium

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/View/ShowTasks.php" <?php if (basename($_SERVER['PHP_SELF']) == "ShowTasks.php") { ?>
                           class="active nav-link"> <?php } else { ?> class="nav-link">  <?php } ?>
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Aufgaben

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/View/ShowClasses.php" <?php if (basename($_SERVER['PHP_SELF']) == "ShowClasses.php") { ?>
                           class="active nav-link"> <?php } else { ?> class="nav-link">  <?php } ?>
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                Klassen

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/View/ShowFaculties.php"
                           <?php if (basename($_SERVER['PHP_SELF']) == "ShowFaculties.php") { ?>class="active nav-link"> <?php } else { ?> class="nav-link">  <?php } ?>
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Fakultas

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/View/ShowCerts.php" <?php if (basename($_SERVER['PHP_SELF']) == "ShowCerts.php") {
                            echo ' class="active nav-link"> ';
                        } else {
                            echo ' class="nav-link">';
                        } ?>
                        <i class="nav-icon fas fa-certificate"></i>
                        <p>
                            Zertifikatskurse
                        </p>
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == TRUE) {
                        echo '
                            <li class="nav-item">
                            <a href="/View/ShowRanks.php" ';
                        if (basename($_SERVER['PHP_SELF']) == "ShowRanks.php") {
                            echo ' class="active nav-link"> ';
                        } else {
                            echo ' class="nav-link">';
                        }
                        echo " <i class='nav-icon fas fa-award'></i>
                                <p>
                                    Dienstgrade
                                </p>
                            </a>
                        </li>";
                    }


                        ?>
                    </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>