<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Document</title>

	<script>
			function validate() {
				var idErr = document.getElementById('id').value;
				var usernameErr = document.getElementById('name').value;
				var emailErr = document.getElementById('email').value;
				var dobErr = document.getElementById('dob').value;
				console.log(idErr);

				if(idErr == "") {
					document.getElementById('errorMsg').innerHTML = "ID is empty";
					document.getElementById('errorMsg').style.color = "green";
					return false;	
				}
				else if(usernameErr == "") {
					document.getElementById('errorMsg').innerHTML = "username is empty";
					document.getElementById('errorMsg').style.color = "green";
					return false;	
				} 
				else if(emailErr == "") {
					document.getElementById('errorMsg').innerHTML = "Email is empty";
					document.getElementById('errorMsg').style.color = "green";
					return false;	
				} 
				else if(dobErr == "") {
					document.getElementById('errorMsg').innerHTML = "Date of birth is empty";
					document.getElementById('errorMsg').style.color = "green";
					return false;	
				} 
				else{
					return true;
				} 			
			}
		</script>
</head>
<body>
	<form name="jsForm" method="POST" action="/Labtask4/employee.php" onsubmit="return validate()" >
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" required=""></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" required=""></td>
			</tr>
			<tr>
				<td>DOB</td>
				<td><input type="dob" name="dob" required=""></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="e_add"></td>
			</tr>

		</table>


	</form>
<?php

include('../model/db.php');
$error="";


$name = $email = $phone =$dob ="";
if(isset($_POST['submit'])){

	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['dob'])){
		
		
		$error = "Empty Field";
		
		
	}
	else{
		$name= $_POST['name'];
		$email= $_POST['email'];
		$dob= $_POST['dob'];
		$connection = new db();
		
		$conobj=$connection->OpenCon();

		$sql = db::updateInfo($conobj,$id, $name, $email,$dob);
		
		
		if ($sql === TRUE) {
		 header('Location:../view/showInfo.php');
		} else {
		echo "Error updating record: " ;
		}



		$connection->CloseCon($conobj);
	}

}
?>