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