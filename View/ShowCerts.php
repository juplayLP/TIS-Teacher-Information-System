<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="de">
<?php
include_once($path.'/includes/head.php');
?>
<body class="hold-transition skin-black fixed sidebar-mini">
<?php
include_once($path.'/includes/navbar.php');
include($path.'/includes/Connect.php');
?>
<!-- Left side column. contains the logo and sidebar -->
<?php
include_once($path.'/includes/Sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1 class="m-0 text-dark">
            Zertifikatskurse
        </h1>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- USER CONTENT HERE!-->
            <div class="card">
                <div class="card-body">
                    <table class='table'>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bezeichnung</th>
                            <th>Kommentar</th>
                            <?php
                            if (isset($_SESSION["loggedin"])) {
                                echo "
                            <th>Bearbeiten</th>
                            <th>Löschen</th>";
                            }?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($res = $con->query('SELECT * FROM zertifikatskurse')){
                            $res->data_seek(0);
                            while ($row = $res->fetch_assoc()) {
                                echo " <tr>
                                    <th scope='row'>" . $row['ZK_ID'] . "</th>
                                    <td>" . $row['ZK_Bez'] . "</td>
                                    <td>" . $row['ZK_Kommentar'] . "</td>";
                                    if (isset($_SESSION["loggedin"])) {
                                        echo"<td>
                                            <a class='btn btn-warning' style='color:white;' data-toggle='modal' data-target='#ZKBearbeiten'>
                                                <i class='icon fas fa-pencil-ruler'></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class='btn btn-danger' data-toggle='modal' data-target='#ZKLoeschen' style='color:white;'>
                                                <i class='icon fas fa-trash'></i>
                                            </a>
                                        </td>";
                        }}}?>
                        </tbody>
                    </table>
                </div>
                <?php
                if (isset($_SESSION["loggedin"])) {
                    echo'
                <div class="card-footer">
                    <a class="btn btn-success" data-toggle="modal" data-target="#ZKHinzufuegen" style="color:white;"><i class="icon fas fa-plus"></i> Hinzuf&uuml;gen</a>
                </div>';}
                ?>
            </div>
            <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once($path.'/includes/Footer.php');
?>
