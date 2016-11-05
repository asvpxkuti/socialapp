<?php //  testing for mysqli.php
  require_once 'functions.php';
$sql = queryMysql("SELECT user FROM profiles WHERE user='jay'");

$row = $sql->num_rows;

echo $row;

$res  = $sql->fetch_array(MYSQLI_ASSOC);

echo $res['user'] ;


?>

    
