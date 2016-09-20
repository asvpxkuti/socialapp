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
        die("Congrates new password has been created.<br><br>");
      }
 
  }

  echo <<<_END
     
<!DOCTYPE html>
<html>
<body>

<form method="post" action="changepass.php">$error
  please enter username:<br>
  <input type="text" name="user" value="$user">
  <br>
  create new password:<br>
  <input type="text" name="newpass" value="$newpass">
  <br><br>
  <input type="submit" value="Submit">
</form>


</body>
</html>

    
_END;
?>
    

    
