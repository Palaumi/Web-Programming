<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["password"]) )  {
          header("location: login.html");
        }

    else {
        if(trim($_POST["name"]) == "" || trim($_POST["username"]) == ""  || trim($_POST["password"]) == "" )  {        
          header("location: login.html");
        }

        else {
            $_SESSION['name'] = $_POST["name"];
            $_SESSION['username'] = $_POST["username"];
            $_SESSION['password'] = $_POST["password"];
            session_write_close();
            header("location: welcome.php");
          }
        }
    }
?>