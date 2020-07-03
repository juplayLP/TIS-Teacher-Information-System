<?php
session_start();
header("Cache-Control: public, max-age=" . 604800);
$path=$_SERVER['DOCUMENT_ROOT'];
if(isset($_SESSION)){
    require($path."/includes/Connect.php");
    $Lehrer=$_POST["Lehrer"];
    $Klasse=$_POST["KID"];
    if(isset($_POST["KLStat"])){
        $KLStat=1;}
    else{
        $KLStat=0;
    }
    if ($res = $con->query("UPDATE `kl_s` set `KL_status` = {$KLStat} WHERE `K_ID` = {$Klasse} AND `L_ID` = {$Lehrer}")){
        echo '
        <head>
            <script src="/plugins/jquery/jquery.min.js"></script>
        </head>
        <script type="text/javascript">
            function submit()
            {
                document.getElementById("startrunning").click(); // Simulates button click
                document.submitForm.submit(); // Submits the form without the button
            }
        </script>
        <body onload="submit()">
        <form action="ShowTeacher.php" id="submitForm" method="post">
            <input type="text" style="Display:None;" name="Lehrer" value="' . $Lehrer . '">
            <input id="startrunning" type="submit">
        </form>
        </body>';
    }else{
        header('Location: ShowTeacher.php');
    }}else{
    header('Location: ../login.php?incomplete=1');
}