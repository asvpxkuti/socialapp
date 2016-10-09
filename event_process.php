<?php

require_once 'header.php';

//$error = $firstname = $lastname = $email = $city = "";
//$event_day = '2013-08-26T12:00:00+00:00';
//YYYY-MM-DD HH:MM:SS

    if(isset($_POST['firstname']) && isset($_POST['lastname']) &&  isset($_POST['city'])){
    $firstname = sanitizeString($_POST['firstname']);
    $lastname = sanitizeString($_POST['lastname']);
    $city = sanitizeString($_POST['city']);
    $email = sanitizeString($_POST['email']);
    //$event_day = sanitizeString($_POST['event_day']);
    
    if($city == "" || $firstname == "" || $email == "" || $lastname == ""){
        $error = "Please fill event form correctly<br><br>";
    }
}else{
    queryMysql("INSERT INTO events VALUES(NULL,'$email','$lastname','$firstname',NULL,'$city',NULL,NULL,NULL)");
    die("<h2>Event Created</h2>");
}



?>