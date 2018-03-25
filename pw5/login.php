<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["username"]) || empty($_POST["password"]) )  {
    header("location: login.html");
    session_write_close();
    exit();
  }
  else {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    if($username == ""  || $password == "" )  {
      header("location: login.html");
      exit();
    }
    else {
      $con = mysqli_connect('localhost', 'root', 'root');

      // Not able to establish connection
      if(!$con)   {
        die('Could not connect: ' + mysqli_error($con));
        header("location: login.html");
      }
      else{
        mysqli_select_db($con, "PW5");
        $query = "SELECT username, password, avatar FROM USERS WHERE username = '" . $username . "';";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result))   {
            if($row["password"] == $password) {
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $row["avatar"];
                session_write_close();
                header("location: welcome.php");
                exit();
            }
        }
        session_write_close();
        header("location: login.html");
        exit();
      }
    }
  }
}
else {
  header("location: login.html");
  session_write_close();
  exit();
}
?>
