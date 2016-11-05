<?php //signup page
    require_once 'header.php';
    
 ?> 



 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src='javascript.js'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
</head>
<body>

<div class="container" id="sign-up">

  <?php

  $error="";
  if (isset($_SESSION['user'])){
    destroySession();
  } 



  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sha1($_POST['pass']);
    
    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br><br>";
    }else{
        $result = queryMysql("SELECT*FROM members WHERE user='$user'");
        
        if($result->num_rows)
            $error = "Sorry that username is already taken<br>";
        
     else{
        queryMysql("INSERT INTO members VALUES('$user', '$pass')");
        die("<h4 id ='signh4'>Account created <a id='signup' href='login.php'>Please Log in.</a></h4><br><br>");
      }
    }
  }




  ?>
  <h2>Create Account</h2>
  <form method="post" action="signup.php">
    <h3><?php echo $error; ?></h3>
    <div class="form-group">
      <input type="text" name="user" onBlur="checkUser(this)" class="form-control" id="user" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <input type="password" name="pass"  class="form-control" id="pwd" placeholder="Create Password">
    </div> 
    <button type="submit" class="btn btn-default">Sign Up</button>
  </form>
</div>

</body>
</html> 