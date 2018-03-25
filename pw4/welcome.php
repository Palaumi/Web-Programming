<?php
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['username']))
    header("location: login.html");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home Page</title>
  </head>
 
  <body>
     <?php
        echo "<h1>Welcome, ", $_SESSION["name"], ".", " Your username is ", $_SESSION["username"] ;
      ?>
  </body>
</html>