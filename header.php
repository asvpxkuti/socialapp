<?php // header.php
  session_start();

  require_once 'functions.php';
  echo "<!DOCTYPE html>\n<html><head>";

  $userstr = ' (Guest)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;
  
  echo "<link rel='stylesheet' href='style.css'>";

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
