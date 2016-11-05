  
<?php require_once('header.php');?>
<?php include("headder.php"); ?> <!-- header for html template -->


  <div class="container">
    <div class="jumbotron">
 
      <h1><?php echo $_GET['view'] ."'s"?> Profile</h1>

      <div class="row">

        <div class="col-md-4"><!-- photo for thumbnail -->

        <?php 

          if (isset($_GET['view'])) 
            $view = sanitizeString($_GET['view']);

          if(!$loggedin) {
             die();
          }
 
          showProfile($view);
            ?>

        </div>

        <div class="col-md-8">
          <h2>About Me</h2>
          <p>
            <?php
                $result = queryMysql("SELECT * FROM profiles WHERE user='$view'");

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

      </div>
  </div><!--  end of container -->

<?php  include("footer.php"); ?>