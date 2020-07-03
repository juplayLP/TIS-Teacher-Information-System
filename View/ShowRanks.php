<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="de">
<?php include_once($path . '/includes/head.php'); ?>
<body class="hold-transition skin-black fixed sidebar-mini">
<?php include_once($path . '/includes/navbar.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once($path . '/includes/Sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dienstgrade</h1>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- USER CONTENT HERE!-->
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dienstgrad</th>
                            <th scope="col">Gehalt</th>
                            <th scope="col">Bearbeiten</th>
                            <th scope="col">L&ouml;schen</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include($path . "/includes/Connect.php");
                        if ($res = $con->query('SELECT * FROM Dienstgrad')) {
                            $res->data_seek(0);
                            while ($row = $res->fetch_assoc()) {
                                echo " <tr> 
                                        <th scope='row'>" . $row['D_ID'] . "</th>
                                        <td>" . $row['D_Bez'] . "</td>
                                        <td>" . $row['D_Geh'] . "&euro;</td>
                                        <td><a class='btn btn-warning' data-toggle='modal' data-target='#DGBearbeiten' style='color:white'><i class='nav-icon fas fa-pencil-ruler'></i></a></td>
                                        <td><a class='btn btn-danger' data-toggle='modal' data-target='#DGLoeschen' style='color:white'><i class='nav-icon fas fa-trash'></i></a></td>
                                    </tr>";
                            }

                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if (isset($_SESSION["loggedin"])) {
                echo'
                <div class="card-footer">
                    <a class="btn btn-success" data-toggle="modal" data-target="#DGHinzufuegen" style="color:white;"><i class="icon fas fa-plus"></i> Hinzuf&uuml;gen</a>
                </div>';} ?>
            </div>
            <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once($path . '/includes/Footer.php'); ?>
