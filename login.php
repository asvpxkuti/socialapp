<?php //login page
  require_once 'header.php';

?>

<?php  include("headder.php"); ?>
  <!-- Main body of our templates -->
 <div class="container-fluid">
  <?php
  $error = $user = $pass = "";
  
  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $pass_hash = sha1($pass);
    //echo $pass_hash;
    if ($user == "" || $pass == ""){
        $error = "Not all fields were entered<br>";
        }
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members WHERE user='$user' AND pass='$pass_hash'");

      
      if ($result->num_rows == 0)
      {
        $error = "innvalid Username or password";
        
      }
      else 
      {

        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass_hash;
        die("<h3 id='signin'>You are now logged in. Please <a href='members.php?view=$user'>" .
            "click here</a> to continue</h3>.<br><br>");
      }
    }
  }
  ?>
    <div class="container">
      <h2>Welcome Please Log In</h2>
      <form method="post" action="login.php">
        <h3><?php echo $error; ?></h3>
        <div class="form-group">
          <input type="text" class="form-control" name="user" placeholder="Please Enter Username">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="pass" placeholder="Enter your password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
        <a class="btn btn-info" href="changepass.php" role="button">Forgot Password</a>
      </form>
    </div> <!-- end of form box -->
</div>



<?php  include("footer.php"); ?>
