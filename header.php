<?php // header.php
  session_start();

  
  echo "<!DOCTYPE html>\n<html><head>";
  
  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else 
    $loggedin = FALSE;
  
  //echo "<link rel='stylesheet' href='style.css'>";
  echo '<link rel="stylesheet" href="form.css">';
  //echo "<link rel='stylesheet' href='style2.css'>";
  //echo "<script src='javascript.js'></script>";
  //echo "<h2>Welcome</h2>";

  if ($loggedin)
  {
     require_once 'home.php';

  }
  else
  {
    require_once 'home2.php';
  }
?>
