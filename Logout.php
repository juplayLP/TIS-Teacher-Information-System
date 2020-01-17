<?php
session_start();
session_destroy();
    echo'<!DOCTYPE html><html><head><meta charset="utf-8"><title>BKR-LIS</title><link href="style.css" rel="stylesheet" type="text/css"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"></head>
	<body class="loggedin">
    <div class="content">
			<p>Successfully logged out, Redirecting to home page!</p>
            <meta http-equiv="refresh" content="2; URL=index.php">
        </div>';
?>
