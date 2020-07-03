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
    if ($res = $con->prepare("INSERT INTO `Lehrer`(`L_ID`, `L_Nachname`, `L_Vorname`, `L_Kuerzel`, `L_VZTZ`, `L_Eintritt`, `L_DID`) VALUES ($L_ID,'$L_Name','$L_Vorname','$L_Kuerzel',$L_VTZT,'$L_Eintritt',$L_DID)")){
        $res->execute();
        header('Location: ShowStaff.php');
    }else{
    header('Location: ../login.php?incomplete=1');
}}