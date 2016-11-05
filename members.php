<?php // members page
  require_once 'header.php';

  if (!$loggedin) 
        die();
  

  include("headder.php"); 
      echo "<div class='container-fluid text-center'>";
        
        if (isset($_GET['view']))
        {
              $view = sanitizeString($_GET['view']);
              
              if ($view == $user)
              {
                $name = "Your";
              } 
              else {              
                $name = "$view's";
              }
                echo "<h3>$name Profile</h3>";

                echo "<a class='msg' href='messages.php?view=$view'>" .
                "View $name messages</a><br><br>";
                if($view != $user ){
                echo "<a class='msg' href='others.php?view=$view'>" .
                "View $name profile</a><br><br>";
              }
                die();
                       
          //showProfile($view);
         } 

     
        if (isset($_GET['add']))
        {
          $add = sanitizeString($_GET['add']);

          $result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend='$user'");
          if (!$result->num_rows)
            queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
        }
        elseif (isset($_GET['remove']))
        {
          $remove = sanitizeString($_GET['remove']);
          queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
        }

        $result = queryMysql("SELECT user FROM members ORDER BY user");
        $num    = $result->num_rows;
        
        echo "<h3>Other Members</h3>";
        echo "<ul class='list-group'>";
       
          if($result->num_rows > 0){

            while($members = $result->fetch_assoc()){
              if ($members['user'] == $user) continue;
        
             echo "<li class='list-group-item'><a href='members.php?view=" . 
              $members['user'] . "'>" . $members['user'] .  "</a>";
            
              $follow = "follow"; 
            

      
            $result1 = queryMysql("SELECT * FROM friends WHERE user='" . $members['user'] . "' AND friend='$user'");
            $t1      = $result1->num_rows;
            $result1 = queryMysql("SELECT * FROM friends WHERE user='$user' AND friend='" . $members['user'] . "'");
            $t2      = $result1->num_rows; 

   
         
          if (($t1 + $t2) > 1)  echo " &harr; is a mutual friend"; 
          elseif ($t1)          echo " &larr; you are following";
          elseif ($t2)       {  echo " &rarr; is following you";
            $follow = "recip"; }
          
          if (!$t1) echo " [<a id='member' href='members.php?add="   .$members['user'] . "'>$follow</a>]";
          else      echo " [<a id='member' href='members.php?remove=".$members['user'] . "'>drop</a>]";
        
           }

         } // end of conditional statement with php tags 
        echo "</ul>";

       echo "</div>"; // end of members container 

  include("footer.php"); 

  ?>
