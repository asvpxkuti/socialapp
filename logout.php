<?php // logout page
  require_once 'header.php';
    echo "<script src='javascript.js'></script>";
    echo '<link rel="stylesheet" href="style.css">';
    echo "<link rel='stylesheet' href='style2.css'>";

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<div class='main'>You have been logged out. Please " .
         "<a href='index.php'>click here</a> to refresh the screen.";
  }
  else 
    echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
?>

    <br><br></div>
  </body>
</html>
