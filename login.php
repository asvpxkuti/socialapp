<?php //login page
  require_once 'header.php';

  $error = $user = $pass = "";
  
  echo "<style>#fg2{margin-left:25%;color:red}#log{color:white}#log1{color:red}</style></head>";

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
        die("<h2 id='log'>You are now logged in. Please <a id='log1' href='members.php?view=$user'>" .
            "click here</a> to continue</h2>.<br><br>");
      }
    }
  }

  echo <<<_END

<div id = "login">
<form method="post" action="login.php">$error
   Enter username:<br>
  <input id="lg1" type="text" name="user" value="$user">
  <br>
  Enter password:<br>
  <input id="lg2" type="password" name="pass" value="$pass">
  <br><br>
  <input id="lg3" type="submit" value="login">
</form>
<h3 id='fg2'><a href='changepass.php'>Click here</a> if you forgot your password</h3>
</div>



_END;


?>
</body>
</html>
    
