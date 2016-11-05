<?php //  testing for mysqli.php
  if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}

//phpinfo();
?>
<?php
      require_once 'bootstrap_template.php'
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#HomeBar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Forever Young</a>
    </div>
    <div class = "collapse navbar-collapse" id="HomeBar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="messages.php">Messages</a></li>
          <li><a href="members.php">Members</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown">My Profile<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">View Profile</a></li>
              <li><a href="view_messages.php">My Messages</a></li>
              <li><a href="view_photos.php">View Photo's</a></li>
              <li><a href="edit_profile.php">Edit Profile</a></li>
            </ul>
          </li>
          <!-- <li><a href="event.php">Create An Event</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
  </div>
</nav>

</body>
</html>


 
