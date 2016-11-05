
 <?php require_once 'header.php';?>
 <?php include("headder.php"); ?>

 <?php
  echo "<div id='main' class='container'>";
 
  echo "<h2>Welcome to LinkUP, </h2>";
  if ($loggedin) 
        echo "<span id='login'>$user, you are logged in.</span>";
  else           
        echo "<span id='login'>please sign up and/or log in to join in.</span>";

  
    
  echo "</div>";
  ?>

<?php  include("footer.php"); ?>
