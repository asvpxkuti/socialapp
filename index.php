<?php // index or better yet home page
  
  //require_once 'home.php';
  require_once 'header.php';

  echo "<br><span class='main'>Welcome to the LinkUP,";

  if ($loggedin) 
        echo " $user, you are logged in.";
  else           
        echo ' please sign up and/or log in to join in.';
?>

    </span><br><br>
  </body>
</html>
