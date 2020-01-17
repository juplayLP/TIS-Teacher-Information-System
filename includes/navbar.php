<header>
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
                    if (isset($_SESSION['loggedin'])) { //show notifications,profile and logout link if logged in, else show login and register buttons in dropdown
                        echo "<li class='nav-item dropdown'> 
                    <a class='nav-link user user-menu' style='padding-right:5rem' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >
                        <img src='/img/account-icon.png' class='user-image' height='30' width='30' style='border-radius:30px;margin-top:0px' alt=''> BKR User </a> 
                    <div class='dropdown-menu bg-gray-dark' aria-labelledby='AccountMenu'>
                        <a class='dropdown-item' href='/Logout.php'><i class='fas fa-user-circle'></i>  Sign Out</a> </li>
            </div>";
                    } else {
                        echo "<li class='nav-item dropdown'> 
                         <a class='nav-link dropdown-toggle' style='padding-right:5rem' href='#' id='AccountMenu' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' ><i class='fas fa-user-circle user-image'></i> Guest </a>
                            <div class='dropdown-menu bg-gray-dark' aria-labelledby='AccountMenu'>
                                <a class='dropdown-item' href='/login.php'>
                                    <i class='fas fa-user-circle'></i>  Log in</a>";
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</header>
