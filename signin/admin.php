<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "../src/register.php">Add a new user</a></h2>
      <h2><a href = "../src/addProfil.php">Add a new profile</a></h2>
      <h2><a href = "../src/addCourse.php">Add a new course</a></h2>
      <h2><a href = "../src/addCourse.php">Delete a course</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>