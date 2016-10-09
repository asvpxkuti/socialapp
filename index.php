<?php // index or better yet home page
  
  //require_once 'home.php';
  require_once 'header.php';
  
    echo "<script src='javascript.js'></script>";
    echo '<link rel="stylesheet" href="style.css">';
    echo "<link rel='stylesheet' href='style2.css'>";

  echo "<br><span class='main'>Welcome to LinkUP,";

  if ($loggedin) 
        echo " $user, you are logged in.";
  else           
        echo ' please sign up and/or log in to join in.';
?>

    </span><br><br>
  </body>
</html>
