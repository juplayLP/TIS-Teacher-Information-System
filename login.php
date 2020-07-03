<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/TIS.ico">
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans"
            rel="stylesheet"
    />
    <title>Login - BKR-Lehrerinformationssystem</title>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        </head>
        <body>
            <?php
            if (isset($_SESSION['loggedin'])) {
                header('Location: home.php');
                exit();}
            if (isset($_GET['incomplete'])){
                echo"<script>function dload () {new M.Toast({html: 'Log in to use this function!', classes: 'rounded'})}</script>
                <script>document.addEventListener('DOMContentLoaded', dload);</script>";
            }
            if (isset($_GET['NoAuth'])){
                echo"<script>function dload () {new M.Toast({html: 'Wrong username or Password!', classes: 'rounded'})}</script>
                <script>document.addEventListener('DOMContentLoaded', dload);</script>";
            }
            ?>
            <div id="bg-image"></div>


            <div class="login">
                <h1><img src="img/TIS.ico" style="max-width: 125px;max-height: 125px"></h1>
                <h1 id="text">BKR-Lehrerinformationssystem </h1>
                <form action="Auth.php" method="post">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <input type="submit" value="Login">
                    </form>
                    <a href="index.php" style="color:white; float:right; padding-top: 15px">Zur&uuml;ck zu "BKR-LIS"</a>
        </html>
