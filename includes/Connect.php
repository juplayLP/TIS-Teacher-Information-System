<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'U_RWDB';
$DATABASE_PASS = "7DhfECcqMMcK18z0";
$DATABASE_NAME = 'lis_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());}