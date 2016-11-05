<?php // Making a simple website
  $dbhost  = 'localhost';    // Unlikely to require changing
  $dbname  = 'webdevelopment';   // Modify these...
  $dbuser  = 'webmaster';   // ...variables according
  $dbpass  = 'ozil';   // ...to your installation
  

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) 
    die($connection->connect_error);

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }
  
  function changePass($query)
  {
    queryMysql($query);
    echo "<h1><a href='login.php'>Click here </a>to log back in</h1>";
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) 
      die($connection->error);
    return $result;
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

   function showProfile($user)
  {
    // $myimage = "uploads/$user.jpg";
      if (file_exists("$user.jpg")){
         echo "<img src='$user.jpg' class='img-responsive img-thumbnail' alt='profile pic' width='200' height='200' >";
        }

  }
  

?>