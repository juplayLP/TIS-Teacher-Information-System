<?php
session_start();
header("Cache-Control: public, max-age=" . 604800);
$path = $_SERVER['DOCUMENT_ROOT'];
if (isset($_SESSION)) {
    require($path . "/includes/Connect.php");
    if ($res = $con->prepare("DELETE FROM `teacher` WHERE `T_ID` = ".$_GET["Teacher"])) {
        $res->execute();
        header('Location: ShowTeacher.php');
    }
    else{
        echo mysqli_error($con);
    }
}else{
        header('Location: ../login.php?incomplete=1');
    }