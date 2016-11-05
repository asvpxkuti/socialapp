
<?php  require_once 'header.php';?>
<?php include("headder.php"); ?>
<?php
  echo "<div id='main' class='container'>";
  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<h3 class='logout'>You have been logged out. Please " .
         "<a href='index.php'>click here</a> to refresh the screen.</h3>";
  }
  else 
    echo "<h3 class='logout'><br>" .
            "You cannot log out because you are not logged in </h3>";

?>

<?php  include("footer.php"); ?>
 