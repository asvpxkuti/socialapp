<?php // changing password 
  require_once 'functions.php';

  $error = $user = $newpass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $newpass = sanitizeString($_POST['newpass']);
    
    if ($user == "" || $newpass == ""){
        $error = "Not all fields were entered<br><br>";
    } else{
        changePass("UPDATE members SET pass = '$newpass' WHERE user = '$user'");
        die("Congratulations new password has been created.");     
      }
  }

  echo <<<_END
     
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='style.css'>
<link rel='stylesheet' href='mystyle.css'>
</head>
<body>
<div id="login">
<form method="post" action="changepass.php">$error
  please enter username:<br>
  <input id="lg1"  type="text" name="user" value="$user">
  <br>
  create new password:<br>
  <input id="lg2"  type="text" name="newpass" value="$newpass">
  <br><br>
  <input id="lg3"  type="submit" value="Submit">
</form>
</div>


</body>
</html>

    
_END;
?>
    

    
