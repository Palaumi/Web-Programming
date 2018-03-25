<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        PW-6
    </title>
</head>
<body>
  <div id="result" style="padding-top: 1%;"></div>
  <?php

    $host = "localhost";
    $db_name = "pw6";
    $username = "root";
    $password = "root";
    $con = mysqli_connect($host, $username, $password, $db_name);

    if(!$con)   {
        die('Could not connect: ' + mysqli_error($con));
    }
    else    {
        //$books = new Book($db);
       // mysqli_select_db($con, $db_name);
        $sql = 'SELECT * FROM Book;';
        $result = mysqli_query($con, $sql);
	    $rowcount=mysqli_num_rows($result);
        if($rowcount > 0)	{
			$books_arr = array();
			$books_arr["books"]=array();
			while($row = mysqli_fetch_array($result))   {
			  $book_item=array(
				"id" => $row["Book_id"],
				"title" => $row["title"],
				"category" => $row["category"],
				"year" => $row["year"],
				"price" => $row["price"]
			  );
			  array_push($books_arr["books"], $book_item);
			}
			echo json_encode($books_arr);
        }
		else	{
			echo json_encode(
				array("message" => "No Books found.")
			);
		}
        mysqli_close($con);
    }
  ?>
</body>
</html>
