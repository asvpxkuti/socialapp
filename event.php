
<?php
require_once 'functions.php';

?>


<!doctype html>
<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="form.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="app.css">
<title>A form</title>
</head>
<body>


<div class="container">
<?php
    //$firstname = $lastname = $city = $email = $phone = $street = "";

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

?>
  <h1>Create an event</h1>
  <br><br>
   <div class="jumbotron" id="form">

    <form id="eventForm" method="POST" action="event.php" >
      <div>
         
          <div class="form-group" id="errorDiv"></div>
        

          <div class="form-group">
          <label for="first-name">Please enter your first name:</label>
          <input name="firstname" type="text" class="form-control" id="name">
          <span class="errorSpan errorfeedback nameErr" id="nameErr">First name: Required</span>
          </div>
       
          <div class="form-group">
          <label for="last-name">Please enter your last name:</label>
          <input name="lastname" type="text" class="form-control" id="last">
          <span class="errorSpan errorfeedback lastErr" id="lastErr">Last name: Required</span>
          </div>
      
        
          <label for="email">Please enter your email:</label>
          <input class="form-control" name="email" type="text"  id="email">
          <span class="errorSpan errorfeedback emailErr" id="emailErr">Email: Required</span>
           

          <div class="form-group">
            <label for="city">City of Event:</label>
            <input name="city" type="text" class="form-control" id="city">
            <span class="errorSpan errorfeedback cityErr" id="cityErr">City: Required</span>
          </div>

          <div class="form-group">
            <label for="phone">Please enter your phone number:</label>
            <input name="phone"  type="text" class="form-control" id="phone">
            <span class="errorSpan errorfeedback phoneErr" id="phoneErr">Phone number: Required</span>
          </div>

          <div class="form-group">
            <label for="street">Street of Event:</label>
            <input name="street" type="text" class="form-control" id="street">
            <span class="errorSpan errorfeedback streetErr" id="streetErr">Street name: Required</span>
          </div>

          <button type="submit" class="btn btn-default">Create Event</button>
      </div>
    </form>
  </div>
  </div>
</body>
</html>
