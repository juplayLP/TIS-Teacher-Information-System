<aside class="main-sidebar sidebar-dark-primary">
    <a href="index.php" class="brand-link">
        <img src="/img/bkr_lis.ico" alt="AdminLTE Logo" class="brand-image img-fluid elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BKR-<b>LIS</b></span>
    </a>
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
<?php
$view = array(
 1=>"KollegiumAnzeigen.php",
    2=>"AufgabenAnzeigen.php",
    3=>"KlassenAnzeigen.php",
    4=>"FakultasAnzeigen.php",
    5=>"ZKAnzeigen.php",
    6=>"DGAnzeigen.php",
);
foreach($view as $item){
    if(basename($_SERVER['PHP_SELF'])==$item){echo' <li class="nav-item has-treeview menu-open"> <a href="#" class="nav-link active">'; break;}
    else{
        if($item==$view[6]){
            echo" <li class='nav-item has-treeview'> <a href='#' class='nav-link'>";
        }
    };
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
                            <a href="/View/KollegiumAnzeigen.php"<?php if (basename($_SERVER['PHP_SELF']) == "KollegiumAnzeigen.php") { ?> class="active nav-link"> <?php } else {?> class="nav-link">  <?php } ?>
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Kollegium

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/View/AufgabenAnzeigen.php" <?php if (basename($_SERVER['PHP_SELF']) == "AufgabenAnzeigen.php") { ?> class="active nav-link"> <?php } else {?> class="nav-link">  <?php } ?>
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Aufgaben

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/View/KlassenAnzeigen.php" <?php if (basename($_SERVER['PHP_SELF']) == "KlassenAnzeigen.php") { ?> class="active nav-link"> <?php } else {?> class="nav-link">  <?php } ?>
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Klassen

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/View/FakultasAnzeigen.php" <?php if (basename($_SERVER['PHP_SELF']) == "FakultasAnzeigen.php") { ?> class="active nav-link"> <?php } else {?> class="nav-link">  <?php } ?>
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    Fakultas

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/View/ZKAnzeigen.php" <?php if (basename($_SERVER['PHP_SELF']) == "ZKAnzeigen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';} ?>
                                <i class="nav-icon fas fa-certificate"></i>
                                <p>
                                    Zertifikatskurse
                                </p>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == TRUE) {
                            echo'
                            <li class="nav-item">
                            <a href="/View/DGAnzeigen.php" ';if (basename($_SERVER['PHP_SELF']) == "DGAnzeigen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                               echo" <i class='nav-icon fas fa-award'></i>
                                <p>
                                    Dienstgrade
                                </p>
                            </a>
                        </li>";
                        }


                        ?>
                    </ul>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <!-- Optionally, you can add icons to the links -->
            <?php
            unset($item);
            if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin']) == TRUE) {

            $edit = array(
                1=>"KollegiumBearbeiten.php",
                2=>"AufgabenBearbeiten.php",
                3=>"KlassenBearbeiten.php",
                4=>"FakultasBearbeiten.php",
                5=>"ZKBearbeiten.php",
                6=>"DGBearbeiten.php"
            );
            foreach($edit as $item){
                if(basename($_SERVER['PHP_SELF'])==$item){
                    echo' <li class="nav-item has-treeview menu-open"> <a href="#" class="nav-link active">';
                    break;
                }
                else{
                    if($item==$edit[6]){
                        echo" <li class='nav-item has-treeview'> <a href='#' class='nav-link'>";
                    }
                };
            }
                echo '     <i class="nav-icon fas fa-pencil-ruler"></i>
                            <p>
                                Edit
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/Edit/KollegiumBearbeiten.php" '; if (basename($_SERVER['PHP_SELF']) == "KollegiumBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Kollegium
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Edit/AufgabenBearbeiten.php" '; if (basename($_SERVER['PHP_SELF']) == "AufgabenBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Aufgaben
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Edit/KlassenBearbeiten.php" '; if (basename($_SERVER['PHP_SELF']) == "KlassenBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-user-graduate"></i>
                                    <p>
                                        Klassen
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Edit/FakultasBearbeiten.php" '; if (basename($_SERVER['PHP_SELF']) == "FakultasBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Fakultas
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Edit/ZKBearbeiten.php" '; if (basename($_SERVER['PHP_SELF']) == "ZKBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-certificate"></i>
                                    <p>
                                        Zertifikatskurse
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="/Edit/DGBearbeiten.php" ';if (basename($_SERVER['PHP_SELF']) == "DGBearbeiten.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                               echo" <i class='nav-icon fas fa-award'></i>
                                <p>
                                    Dienstgrade
                                </p>
                            </a>
                        </li>
                        </ul>
                    </li><ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu'>";
                unset($item);
                $add = array(
                    1=>"KollegiumHinzufuegen.php",
                    2=>"AufgabenHinzufuegen.php",
                    3=>"KlassenHinzufuegen.php",
                    4=>"FakultasHinzufuegen.php",
                    5=>"ZKHinzufuegen.php",
                    6=>"DGHinzufuegen.php",
                );
                foreach($add as $item) {
                    if (basename($_SERVER['PHP_SELF']) == $item) {
                        echo ' <li class="nav-item has-treeview menu-open"> <a href="#" class="nav-link active">';
                        break;
                    } else {
                        if ($item == $add[6]) {
                            echo " <li class='nav-item has-treeview'> <a href='#' class='nav-link'>";
                        }
                    };
                }
                echo'
                            <i class="nav-icon fas fa-plus"></i>
                            <p>
                                Add
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/Add/KollegiumHinzufuegen.php" '; if (basename($_SERVER['PHP_SELF']) == "KollegiumHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Kollegium
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Add/AufgabenHinzufuegen.php" '; if (basename($_SERVER['PHP_SELF']) == "AufgabenHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>
                                        Aufgaben
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Add/KlassenHinzufuegen.php" '; if (basename($_SERVER['PHP_SELF']) == "KlassenHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-user-graduate"></i>
                                    <p>
                                        Klassen
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Add/FakultasHinzufuegen.php" '; if (basename($_SERVER['PHP_SELF']) == "FakultasHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>
                                        Fakultas
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/Add/ZKHinzufuegen.php" '; if (basename($_SERVER['PHP_SELF']) == "ZKHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                                echo'
                                    <i class="nav-icon fas fa-certificate"></i>
                                    <p>
                                        Zertifikatskurse
                                        
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                            <a href="/Add/DGHinzufuegen.php" ';if (basename($_SERVER['PHP_SELF']) == "DGHinzufuegen.php") { echo' class="active nav-link"> ';} else {echo' class="nav-link">';}
                               echo" <i class='nav-icon fas fa-award'></i>
                                <p>
                                    Dienstgrade
                                </p>
                            </a>
                        </li>
                        </ul>
                    </li>"
                    ;
            }
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>