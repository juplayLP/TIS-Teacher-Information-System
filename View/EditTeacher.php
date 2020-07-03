<?php
session_start();
header("Cache-Control: public, max-age=" . 604800);
$path=$_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION)){
require($path."/includes/Connect.php");
    $L_ID=$_POST["Lehrer"];
    $L_Name=$_POST["Name"];
    $L_Vorname=$_POST["Vorname"];
    $L_Kuerzel=$_POST["Kuerzel"];
    if(!isset($_POST["VZTZ"])){
        $L_VZTZ=0;
    }else{
        $L_VTZT=1;
    }
    $L_Eintritt=$_POST["Eintritt"];
    $L_DID=$_POST["Dienstgrad"];
if ($res = $con->prepare("UPDATE `Lehrer` set `L_Nachname`='".$L_Name."', `L_Vorname`='".$L_Vorname."',`L_Kuerzel`='".$L_Kuerzel."',`L_VZTZ`=".$L_VTZT.",`L_Eintritt`='".$L_Eintritt."',`L_DID`=".$L_DID." WHERE `L_ID`=".$L_ID)){
        $res->execute();
    header('Location: ShowTeacher.php');
}}else{
    header('Location: ../login.php?incomplete=1');
}