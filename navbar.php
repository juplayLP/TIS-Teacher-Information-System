<?php session_start();?>
<!DOCTYPE HTML>
<head>
    <link rel="stylesheet" href="FV.css"> <!-- Custom CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> <!-- using FA cuz it was fastest to find for me-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > <!-- Bootstrap as a under-layer-->
    <!-- Bootstrap Requirements-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>
<nav class="navbar navbar-dark sticky-top"> <!-- Make a navbar, make it dark, let it be seen on top of page even when scrolling-->
<div class="container"><!-- pad in the navbar's controls-->
    <a class="navbar-brand" href="index.php"> <!-- FV icon+Text+ redirect to index on click-->
        <img src="images/FV_Logo_Rounded_s.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Furry Valley
    </a>
    <ul class="nav justify-content-end"> <!-- make navbar buttons stick to the right side-->
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a> <!-- Sends you to homepage-->
        </li>
        <li class="nav-item dropdown active"> <!-- Games dropdown button-->
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          Games
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <!-- Dropdown content-->
          <a class="dropdown-item" href="games/League.php">League of Legends</a> <!-- Add item to dropdown by copying this line and edit link and text-->
          <a class="dropdown-item" href="games/Warframe.php">Warframe</a>
          <a class="dropdown-item" href="#">Gameexample</a>
        </div>
        </li>
        <?php
            if (isset($_SESSION['loggedin'])){ //show notifications,profile and logout link if logged in, else show login and register buttons in dropdown
            if (!is_null($_SESSION['PIPath'])){
                echo"<li class='nav-item'> <a class='nav-link' href='profile.php#notifications'>  <i class='fas fa-bell'></i></a></li> <li class='nav-item dropdown'> <a class='nav-link dropdown-toggle' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' > <img src='".$_SESSION['PIPath']."' width='30' height='30' class='d-inline-block align-top' alt=''> ".$_SESSION['name']." </a> <div class='dropdown-menu' aria-labelledby='AccountMenu'> <a class='dropdown-item' href='Profile.php'><i class='fas fa-user-circle'></i>  Profile</a> <a class='dropdown-item' href='Logout.php'><i class='fas fa-user-circle'></i>  Sign Out</a> </li>";
                }else{
                    echo"<li class='nav-item'> <a class='nav-link' href='profile.php#notifications'><i class='fas fa-bell'></i> </a></li> <li class='nav-item dropdown'> <a class='nav-link dropdown-toggle' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' > <i class='fas fa-user-circle'></i> ".$_SESSION['name']." </a> <div class='dropdown-menu' aria-labelledby='AccountMenu'> <a class='dropdown-item' href='Profile.php'><i class='fas fa-user-circle'></i>  Profile</a> <a class='dropdown-item' href='Logout.php'><i class='fas fa-user-circle'></i>  Sign Out</a> </li>";
                }
                }else{echo"<li class='nav-item dropdown'> <a class='nav-link dropdown-toggle' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' > <i class='fas fa-user-circle'></i> Guest </a> <div class='dropdown-menu' aria-labelledby='AccountMenu'> <a class='dropdown-item' href='login.php'><i class='fas fa-user-circle'></i>  Log in</a> <a class='dropdown-item' href='register.php'><i class='fas fa-user-circle'></i>  Register</a> </li>";}
    ?>
    



