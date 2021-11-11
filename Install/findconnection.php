<?php       //LITERALLY CHECKS IF CONNECTION FILE ALREADY EXISTS, REDIRECTS TO CONNECTION CREATOR ELSEWISE
if(file_exists($_SERVER['DOCUMENT_ROOT']."/connection.php")){ //if file exists
    include($_SERVER['DOCUMENT_ROOT']."/connection.php"); //include it
    $checkconnection = "SELECT *;"; //check it
    $results = $con->query($checkconnection);
    if($results){
        if($results->num_rows === 0){ //if not working
            header("/install2.php=?result=corrupted_or_nonexistant"); //Redirect to connection creation page
        } else {
            //could probably be the correct one, need to check the rights for tables and, if needed, reset them; then redirect to User Creation page
        }
    }
} else {
    //file does not exist, redirect to connection creation page
    header("install2.php");
}
