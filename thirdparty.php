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

    <div class="content-header">
        <h1 class="m-0 text-dark" style="text-align:center;">
            Third-party attributions
        </h1>
    </div>

    <section class="content">
        <div class="container-fluid">
            <h5 style="text-align: center;color:grey">The creation of this software wouldn't have been possible without
                the work of the people behind these projects</h5>
            <div class="row">
                <div class="col-md-4">
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>PHP</h3>
                        </div>
                        <div class="card-body">Fast and Flexible Scriptlanguage, purposebuilt for the Web</div>
                        <div class="card-footer">
                            <button class="btn-outline-primary btn-sm" href="#">Learn more</button>
                        </div>
                    </div>
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>FontAwesome</h3>
                        </div>
                        <div class="card-body">Iconset with over 1500 Icons</div>
                        <div class="card-footer">
                            <button class="btn-outline-primary btn-sm" href="http://www.fontawesome.com">Learn more
                            </button>
                            <button class="btn-outline-primary btn-sm" href="#">License</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>Bootstrap 4</h3>
                        </div>
                        <div class="card-body">One of the most used CSS/JS Frameworks out there.</div>
                        <div class="card-footer">
                            <button class="btn-outline-primary btn-sm" href="#">Learn more</button>
                        </div>
                    </div>
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>Bootstrap Datetimepicker</h3>
                        </div>
                        <div class="card-body">Datepicker and format tool</div>
                        <div class="card-footer">
                            <button class="btn-outline-primary btn-sm"
                                    href="https://github.com/eonasdan/bootstrap-datetimepicker/">Learn more
                            </button>
                            <button class="btn-outline-primary btn-sm" href="#,,

">License
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='card'>
                        <div class='card-header'>
                            <h3 class='card-title'>AdminLTE v3</h3>
                        </div>
                        <div class="card-body">Responsive Admin Template, based on Bootstrap</div>
                        <div class="card-footer">
                            <button class="btn-outline-primary btn-sm" href="https://github.com/ColorlibHQ/AdminLTE">
                                Learn more
                            </button>
                            <button class="btn-outline-primary btn-sm" href="https://github.com/ColorlibHQ/AdminLTE">
                                License
                            </button>
                        </div>
                    </div>
                </div>
                <a class="btn btn-outline-primary blue" onclick="history.go(-1);">return to the previous page</a>
            </div>
            <noscript><p>This Site Requires Javascript to be enabled to work. please enable Javascript.</p></noscript>
        </div>
    </section>

</div>
<!-- /.content-wrapper -->
<?php include_once($path . '/includes/Footer.php'); ?>
