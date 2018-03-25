<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home Page</title>
    <style>
    #imgContainer{
      padding-left: 2%;
    }
    </style>
  </head>
 
  <body>
    <?php
    session_start();
    if (!isset($_SESSION['username']))  {
        header("location: login.html");
        exit();
    }
    else {
      $con = mysqli_connect('localhost', 'root', 'root');
      if(!$con)   {
          die('Could not connect: ' + mysqli_error($con));
      }
      else    {
        mysqli_select_db($con, "PW5");
        $queryUser = 'SELECT * FROM Users WHERE username = "'. $_SESSION["username"] .'";';
        $queryBook = 'SELECT username, booktitle FROM FavoriteBooks WHERE username = "'. $_SESSION["username"] .'";';
        $userResult = mysqli_query ($con, $queryUser);
        $bookList = mysqli_query($con, $queryBook);

        $userData = mysqli_fetch_array($userResult);
        echo "<h1>Welcome " . $userData['fullname'] . ", </h1>";
        echo "<div id='imgContainer'><img width='80px' src='img/" . $userData['avatar'] . "'' alt='" . $userData['avatar'] . "' class='img-thumbnail'/></div>";
        echo "<h4>List of Favorite Books:</h4>";
        echo "<ul>";
        while($row = mysqli_fetch_array($bookList))   {
            echo "<li>";
            echo $row["booktitle"];
            echo "</li>";
        }
        echo "</ul>";
        mysqli_close($con);
      }
    }

    ?>
  </body>
</html>
