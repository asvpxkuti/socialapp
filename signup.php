<?php // signup page
  require_once 'functions.php';



  $error = $user = $pass = "";
  if (isset($_SESSION['user'])){
    destroySession();
  } 

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br><br>";
    } else{
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die("<h4>Account created</h4>Please Log in.<br><br>");
      }
 
  }

  echo <<<_END
     
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div id ="signin">
<form method="post" action="signup.php">$error
  create username:<br>
  <input id="sub1" type="text" name="user" value="$user">
  <br>
  create password:<br>
  <input id="sub1" type="text" name="pass" value="$pass">
  <br><br>
  <input id="sub2" type="submit" value="Submit">
</form>
</div>


</body>
</html>

    
_END;
?>
    

    
