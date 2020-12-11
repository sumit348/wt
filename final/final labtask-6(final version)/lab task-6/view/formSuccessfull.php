<?php

session_start(); 
if (empty($_SESSION['name']) || empty($_SESSION['email'])|| empty( $_SESSION['password']) || empty($_SESSION['cpassword'])  || empty($_SESSION['id']))
{
header("Location: registration.php");
}




?>


<!DOCTYPE html>
<html>
<body>


<center>
	<table>
	 <tr>
	   <td>
		 <fieldset>
		 <h2>You are Successfully Registered <?php echo $_SESSION["name"];?></h2>
		 <h3>for login <a href="../php/logout.php">click here</a></h3>
		</fieldset>
	   </td>
	 </tr>
 </center>
</body>
</html>

<?php


?>   
