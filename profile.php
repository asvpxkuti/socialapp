  
<?php require_once('header.php');?>
<?php include("headder.php"); ?> <!-- header for html template -->


  <div class="container">
    <div class="jumbotron">

      <h1>Your Profile</h1>

      <div class="row">

        <div class="col-md-4"><!-- photo for thumbnail -->

        <?php 

          if(!$loggedin) {
             die();
          }
          
          $test = " ";
          $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
            
          if (isset($_POST['text']))
          {
            $text = sanitizeString($_POST['text']);
            $text = preg_replace('/\s\s+/', ' ', $text);

            if ($result->num_rows)
                 queryMysql("UPDATE profiles SET text='$text' where user='$user'");
            else 
              queryMysql("INSERT INTO profiles VALUES('$user', '$text')");
          }
          else
          {
            if ($result->num_rows)
            {
              $row  = $result->fetch_array(MYSQLI_ASSOC);
              $text = stripslashes($row['text']);
            }
            else $text = "";
          }

          $text = stripslashes(preg_replace('/\s\s+/', ' ', $text));

          if (isset($_FILES['image']['name']))
          {
            $saveto = "$user.jpg";
            $image = $_FILES['image']['name'];
            $text = $_POST['text'];
            $sql = queryMysql("INSERT INTO images(image,text) VALUES('$image','$text')");

            move_uploaded_file($_FILES['image']['tmp_name'], $saveto); 
          }

          showProfile($user);
            ?>

        </div>

        <div class="col-md-8">
          <h2>About Me</h2>
          <p>
            <?php
                $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

                if ($result->num_rows)
                {
                  $row = $result->fetch_array(MYSQLI_ASSOC);
                  $about_me_test = stripslashes($row['text']);
                  echo "<em class='text-center'>$about_me_test</em>";
                }

            ?>

          </p>  

        </div>


      </div>

          
  
      <form method='post' action='profile.php' enctype='multipart/form-data'>
          <h3>Enter or edit your details and/or upload an image</h3>
          <textarea class="form-control" name='text' cols='50' rows='3' placeholder='Write something about your self'></textarea>
          <h3>Image: </h3>
          <div class="form-group">
          <input  type='hidden' class="form-control" name='size' value='1000000'>
          </div>
          <div class="form-group">
          <input  type='file' class="form-control" name='image' size='14'>
          </div>
          <button type="submit" class="btn btn-default">Save Profile</button>
      </form>
      </div>
  </div><!--  end of container -->

<?php  include("footer.php"); ?>