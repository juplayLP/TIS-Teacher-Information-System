<?php session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html lang="de">
<?php include_once($path.'/includes/head.php'); ?>
<body class="hold-transition skin-black fixed sidebar-mini">
<?php include_once($path.'/includes/navbar.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once($path.'/includes/Sidebar.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <h1 class="m-0 text-dark">
            Bitte Wählen sie aus der Sidebar gewünschte Informationen aus.
        </h1>
    </div>

    <section class="content">
        <div class="container-fluid">

            <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
<?php include_once($path.'/includes/Footer.php'); ?>

