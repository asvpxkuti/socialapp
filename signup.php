<?php //signup page
  //require_once 'functions.php';
    require_once 'header.php';
    
    echo "<script src='javascript.js'></script>";
    echo '<link rel="stylesheet" href="style.css">';
    echo "<link rel='stylesheet' href='style2.css'>";
    
    
  echo <<<_END
  <script>
    function checkUser(userg)
    {
      if (userg.value == '')
      {
        O('info').innerHTML = ''
        return
      }

      params  = "user=" + userg.value
      request = new ajaxRequest()
      request.open("POST", "checkusername.php", true)
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
      request.setRequestHeader("Content-length", params.length)
      request.setRequestHeader("Connection", "close")

      request.onreadystatechange = function()
      {
        if (this.readyState == 4)
        {   
          if (this.status == 200)
          {         
            if (this.responseText != null)
            {
              O('info').innerHTML = this.responseText
            }
          }
        }
      }
      request.send(params)
    }

    function ajaxRequest()
    {
      try { 
        var request = new XMLHttpRequest() 
        }
      catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") 
        }
        catch(e2) {
          try { request = new ActiveXObject("Microsoft.XMLHTTP")
           }
          catch(e3) {
            request = false
            } 
          } 
      }
      return request
    }
  </script>
  
_END;

  $error = $user = $pass = "";
  if (isset($_SESSION['user'])){
    destroySession();
  } 

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br><br>";
    }else{
        $result = queryMysql("SELECT*FROM members WHERE user='$user'");
        
        if($result->num_rows)
            $error = "Sorry that username is already taken<br>";
        
     else{
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die("<h4>Account created <a href='login.php'>Please Log in.</a></h4><br><br>");
      }
    }
  }

  echo <<<_END

<body>

<div id ="signin">
<form method="post" action="signup.php">$error
  create username:<br>
  <input id="sub1" type="text" name="user" value="$user" onBlur="checkUser(this)">
  <br>
  <span id="info"></span><br>
  create password:<br>
  <input id="sub1" type="text" name="pass" value="$pass">
  <br><br>
  <input id="sub2" type="submit" value="Sign Up">
</form>


    
_END;
?>

        </div>
    </body>
</html>
    

    
