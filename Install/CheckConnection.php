<?php
$server=$_POST['Server'];
$user=$_POST['DBUser'];
$pass=$_POST['DBPass'];
$initcon = mysqli_connect($server, $user, $pass,'mysql',$_POST['port']); //TODO: CHECK FOR EXISTING/VALID Connection file, only overwrite if unusable
if ( mysqli_connect_errno() ) {
	header( "install2.php?Successfull=0");}
else {
    echo "<form action='install2.php?Successfull=1' method='post'>
	<input type='text' name='server' content='" . $server . "' readonly>
	<input type='text' name='user' content='" . $user . "' readonly>
	<input type='password' name='pass' content='" . $pass . "' readonly>
	<input type='text' name='port' content='" . $_POST['port'] . "' readonly>";
    $InitQuery = "CREATE DATABASE IF NOT EXISTS tis-base";
    mysqli_query($initcon, $InitQuery);
    $MyUserMaker = "CREATE USER"; //Todo:Add User Creation for TIS-BASE
    mysqli_close($initcon);
    mysqli_connect($server, $user, $pass, 'tis-base', $_POST['port']);
    if (mysqli_connect_errno()) {
        header("install2.php?Successfull=2");
    }
    else {
        $file = fopen('\connection.php','c+');
        function createUserData(int $strlen){
        $rndchar[]=['A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z','1','2','3','4','5','6','7','8','9','0','!','(',')','=','*','§'];
        $finalname="";
        while ($strlen>0){
            $currentletter = random_int(0, sizeof($rndchar));
            $finalname = $finalname+$rndchar[$currentletter];
        }
        }

        $content = "<?php $server = '".$server."' \n $user='".$user."' \n $pass ?>";
        fwrite($file,$content);
        fclose($file);}
    }
