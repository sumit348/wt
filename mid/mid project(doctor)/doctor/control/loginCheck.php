<?php


if(isset($_REQUEST['submit'])){
	$id = $_REQUEST['id'];
	$password = $_REQUEST['password'];
	$myfile = fopen("../view/registrationfile.txt", "r");
	$readfile = fread($myfile, filesize("../view/registrationfile.txt"));
	$user_info = explode("|", $readfile);
	if(empty($id) || empty($password)){


		header('location: ../index.php?msg=null');
	}else{


		if($user_info[2] == $id and $user_info[3] == $password){
			session_start();
			$_SESSION['id'] = $id;
			header('location:../view/Dhome.php');
			
			
		
	}else{
		header('location: ../view/index.php?msg=invalid');
	}
}
}else{
	header('location: ../view/index.php');
}


?>