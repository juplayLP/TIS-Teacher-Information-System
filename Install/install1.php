<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TIS - First time Installer</title>
    <meta name="description" content="none">

    <!--iOS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="194x194" href="/img/icon/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/img/icon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icon/favicon-16x16.png">
    <link rel="manifest" href="/img/icon/site.webmanifest">
    <link rel="mask-icon" href="/img/icon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/icon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="TIS">
    <meta name="application-name" content="TIS">
    <meta name="msapplication-TileColor" content="#3e424b">
    <meta name="msapplication-TileImage" content="/img/icon/mstile-144x144.png">
    <meta name="msapplication-config" content="/img/icon/browserconfig.xml">
    <meta name="theme-color" content="#3a3943">
    <link href="/CSS/all.min.css" rel="stylesheet">


    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <link rel="stylesheet" href="/CSS/adminlte.min.css" async>
    <link rel="stylesheet" href="/CSS/bootstrap-table.min.css" async>
    <style type="text/css">
        .back-link a {
            color: #4ca340;
            text-decoration: none;
            border-bottom: 1px #4ca340 solid;
        }
        .back-link a:hover,
        .back-link a:focus {
            color: #408536;
            text-decoration: none;
            border-bottom: 1px #408536 solid;
        }
        h1 {
            height: 100%;
            /* The html and body elements cannot have any padding or margin. */
            font-family: 'Open Sans', sans-serif;
            font-size: 32px;
            margin: 0 0 3px;
        }
        .entry-header {
            text-align: left;
            margin: 0 auto 50px auto;
            width: 80%;
            max-width: 978px;
            position: relative;
            z-index: 10001;
        }
        #demo-content {
            padding-top: 100px;
        }
    </style>
</head>
<body class="hold-transition skin-black fixed sidebar-mini demo">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<!-- Demo content -->
<div id="demo-content">

    <header class="entry-header">

        <h1 class="entry-title">TIS First-time installer</h1>
    </header>

    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>

    <div id="content">
        <div style="text-align: center" class="card">
            <div  class="card-header">
                <h2 style="color:#506050">TIS - Installer</h2>
                <h1>Prerequisites</h1>
            </div>
            <div class="card-body">
                In order to be able to use the Teacher Information Systems, you'll need to have the following Features on your Webserver.
                <ul style="text-align: left"> <!-- TODO Actually check for needed prerequisites -->
                    <i class="fas fa-check-square" style="color:green"></i>MySQL - Version 8.0 or above</br><!--ToDo: Link to get current Version of MySQL-->
                    <i class="fas fa-check-square" style="color:green"></i>HTTP2</br> <!-- ToDo: Add link on how to enable HTTP2 on different Servers (Google Lighthouse)-->
                    <i class="fas fa-check-square" style="color:green"></i>Serverside Caching Policy</br> <!--ToDo: Add Example Caching rule-->
                    <i class="fas fa-check-square" style="color:green"></i>SSL <!--ToDo: Add example links where one can get free SSL Certs-->
                </ul>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="findconnection.php" style="color:white">Start! <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/main.js"></script>

</body>
<footer class="main-footer float-bottom" style="margin-left:0px; margin-top:180px ">
     <div class="float-right d-none d-sm-inline">
        TIS - Teacher Information Systems Installer
    </div>
     <strong>Copyright &copy; 2019/2020
        <a>Julian Schüler</a>
        .</strong> All rights reserved.
    <a href="/thirdparty.php">3rd Party attributions</a>
</footer>
</html>
