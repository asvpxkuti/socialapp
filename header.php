<?php // header.php
  session_start();

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

  if ($loggedin)
  {
     require_once 'home.php';

  }
  else
  {
    require_once 'home2.php';
  }
?>
