<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
</head>
<body>
<?php

      $conn= new mysqli("localhost","sumit","12345","wt");
	  if($conn-> connect_error)
	  {
		  die("connection failed");
	  }
	  else
	  {
		  echo "connected";
		  echo "</br>";
		  $createTableSql="CREATE TABLE USERS(
		  Id INT(6)PRIMARY KEY,
		  Name VARCHAR(30) NOT NULL,
		  Balance VARCHAR(30) NOT NULL
		  
		  )";
		  if($conn -> query($createTableSql))
		  {
			  echo "table created";
	      }
		  else
		  {
			  echo "table created unsuccessfull";
			  echo "<br>";
			  echo $conn->error;
		  }
	  }
      $conn->close();
?>
</body>
</html>