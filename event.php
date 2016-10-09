
<?php

require_once 'header.php';

if(!$loggedin){
    die();
}

echo '<link rel="stylesheet" href="style.css">';

$firstname = $lastname = $city = $email = $phone = $street = "";

if(isset($_POST['firstname']) && isset($_POST['lastname']) &&  isset($_POST['city'])){
    $firstname = sanitizeString($_POST['firstname']);
    $lastname = sanitizeString($_POST['lastname']);
    $city = sanitizeString($_POST['city']);
    $email = sanitizeString($_POST['email']);
    $phone = sanitizeString($_POST['phone']);
    $street = sanitizeString($_POST['street']);
    //$event_day = sanitizeString($_POST['event_day']);
    
            if($city == "" || $firstname == "" || $email == "" || $lastname == ""){
                echo "<h2>Please fill event form correctly</h2><br><br>";
            }else{
            queryMysql("INSERT INTO events VALUES(NULL,'$email','$lastname','$firstname','$street','$city',NULL,NULL,'$phone')");
                die("<h2>Event Created</h2>");
            }
}
 
 
echo <<<_END
<body>

<div id ="eventInfo">
<form method="post" action="event.php">
  Please enter your first name:<br>
  <input class="sub1" type="text" name="firstname" value="$firstname">
  <br>
  Please enter your last name:<br>
  <input class="sub1" type="text" name="lastname" value="$lastname">
  <br>
  Please enter your email:<br>
  <input class="sub1" type="text" name="email" value="$email" >
  <br>
  City of event:<br>
  <input class="sub1" type="text" name="city" value="$city">
  <br>
  Your phone number:<br>
  <input class="sub1" type="text" name="phone" value="$phone">
  <br>
  Street of event:<br>
  <input class="sub1" type="text" name="street" value="$street">
  <br>
  <input class="sub2" type="submit" value="Create Event">
</form>   
_END;


?>  