<?php // Example 26-7: login.php
  require_once 'header.php';

  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br>";
        }
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members WHERE user='$user' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "Invalid Username";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("You are now logged in. Please <a href='members.php?view=$user'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }

  echo <<<_END
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div id = "login">
<form method="post" action="login.php">$error
   user:<br>
  <input id="lg1" type="text" name="user" value="$user">
  <br>
  Enter password:<br>
  <input id="lg2" type="text" name="pass" value="$pass">
  <br><br>
  <input id="lg3" type="submit" value="login">
</form>
</div>


</body>
</html>
_END;
?>

    
