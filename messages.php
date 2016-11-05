<?php //messages page
  require_once 'header.php';


  if (!$loggedin) 
    die();

  if (isset($_GET['view'])) 
    $view = sanitizeString($_GET['view']);
  else                      
    $view = $user;

  if (isset($_POST['text']))
  {
    $text = sanitizeString($_POST['text']);

    if ($text != " ")
    {
      $pm   = substr(sanitizeString($_POST['pm']),0,1);
      $time = time();
      queryMysql("INSERT INTO messages VALUES(NULL, '$user',
        '$view', '$pm', $time, '$text')");
    }
  }

  if ($view != "")
  {
    if ($view == $user) 
      $name1 = $name2 = "Your";
    else
    {
      $name1 = "<a href='members.php?view=$view'>$view</a>'s";
      $name2 = "$view's";
    }
include("headder.php"); 
    echo "<div class='container profile'>"; //beginning of the body
    echo "<h1>$name1 Messages</h1>";
    // showProfile($view);
    
    echo <<<_END
      <form method='post' action='messages.php?view=$view'>
        <em>Type here to leave a message:</em><br>
        <textarea class='form-group' name='text' cols='40' rows='3'></textarea><br>
        
       
        <label class='radio-inline'>
          <input type='radio' name='pm' value='0' checked='checked'>Public
        </label>
       
        <label class='radio-inline'>
          <input type='radio' name='pm' value='1'>Private
        </label>
        <br>
        <button type='submit' class='btn btn-success'>Post Message</button>
      </form>
_END;

    if (isset($_GET['erase']))
    {
      $erase = sanitizeString($_GET['erase']);
      queryMysql("DELETE FROM messages WHERE id=$erase AND recip='$user'");
    }
    
    $query  = "SELECT * FROM messages WHERE recip='$view' ORDER BY time DESC";
    $result = queryMysql($query);
    $num    = $result->num_rows;
    
    for ($j = 0 ; $j < $num ; ++$j)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);

      if ($row['pm'] == 0 || $row['auth'] == $user || $row['recip'] == $user)
      {
        echo date('M jS \'y g:ia:', $row['time']);
        echo " <a href='messages.php?view=" . $row['auth'] . "'>" . $row['auth']. "</a> ";

        if ($row['pm'] == 0)
          echo "wrote: &quot;" . $row['message'] . "&quot; " . "<br>";
        else
          echo "whispered: <span class='whisper'>&quot;" .
            $row['message']. "&quot;</span>" . "<br>";

        if ($row['recip'] == $user)
          echo "[<a href='messages.php?view=$view" .
               "&erase=" . $row['id'] . "'>erase</a>]" . "<br>";

       
      }
    }
  }

  if (!$num) 
    echo "<p > Theres no messages yet</p><br>";

    echo "<br><a href='messages.php?view=$view'>Refresh messages</a>";

  echo "</div>"; //end of body container
include("footer.php"); 
?>