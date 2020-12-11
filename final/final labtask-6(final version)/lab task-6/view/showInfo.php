<?php
include ('../model/db.php');


$connection = new db();
$conobj=$connection->OpenCon();

$sql = "SELECT id,username, pass,email,dob FROM userinfo";
$result = $conobj->query($sql);
	
$connection->CloseCon($conobj); 
	


?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<center>
   <h2>User Information</h2>

	<table border=1 cellspacing="0">
	    <thead>
			<th>id</th>
			<th>username</th>
			<th>email</th>
			<th>pass</th>
			<th>dob</th>
			<th>Action</th>
		</thead>
		 <tbody>    
			
				<?php
					if ($result->num_rows > 0) {
		
		        while($row = $result->fetch_assoc()) {
			  
			 echo "<tr>";
			echo "<td>$row[id]</td> 
			      <td>$row[username]
				  <td>$row[pass]</td>
				  <td>$row[email]</td>
			      <td>$row[dob]<br></td>
			      <td><a href=update.php?id=$row[id]>Update</a> <a href=../php/deleteCheck.php?id=$row[id]>Delete</a><br></td>";
			echo "</tr>";
			
	        }
			
		        }
				?>
			
		</tbody>
	</table>
	</center>
	
</body>
</html>