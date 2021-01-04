<?php
include '../control/DoctorsControls.php';
	//session starts
	session_start();
	if(isset($_SESSION['did']))
	{
		if (time()-$_SESSION['last_time']>1800) //30 min inactive thakle logout automatic
		{
			header("Location:../control/LogoutControl.php");
		}
		else
		{
			$_SESSION['last_time']=time();
		}
	}
	else
	{
		header("Location:Login.php");
	}
	global $id;
	$id = $_SESSION['did'];
	include('../control/dnamecheck.php');
	//session ends
?>
<html>
	<head>
		<title>
			Doctor Home Page
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/doctorhomepage.css">
		<link rel="stylesheet"type="text/css"href="CSS/doctorcss.css">
	</head>
	<body>
		<button class="button"onclick="window.location='../control/LogoutControl.php'">Logout</button>
		<button type="button"name="home"class="button"onclick="window.location='DoctorHomePage.php'">Home Page</button>
		<button class="button"onclick="window.location='DoctorNotification.php'">Noification</button>
		<div class="div1">
			<h2>Home Page</h2>
		</div>
		<label class="l1">Welcome Doctor :<?php echo $_SESSION['did'] ?><label>
			<center>
	    <h4>	
	     <?php
		    if(isset($_COOKIE['dname'])){
		    	echo "User Name:" .$_COOKIE['dname'];
		    }
		 ?>
		</h4>
		</center>
		<div class="sidebar">                <!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav_dropdown-->
			<a href="DoctorProfile.php">Profile</a>
			<a href="DoctorSetSchedule.php">Set Schedule</a>
			<a href="DoctorPatientWaiting.php">Patient Wating</a>
			<a href="DoctorPatientRequest.php">Patient Request</a>
			<a href="DoctorPatientRecords.php">Patient Records</a>
			<a href="DoctorSalary.php">Doctor Salary</a>
		</div>
		<form method="POST" action="" class="leave-form">
			
			 <h6 style="text-align: center; font-style: normal; color: red; font-family: arial; font-size: 16px;">
			 	<?php 
				if (isset($msg1)) {
					echo $msg1;
				}
			 ?></h6>
			<div class="">
				<input type="hidden" name="did" value="<?php echo $_SESSION['did'] ?>">
			<label for="leave">Request To Admin </label><br>
			<input type="text" name="goods" id="leave"><br>
			<input type="submit" name="equipment" class="leave" value="Equipment">
		</div>
		</form>

		<form method="POST" action="" class="leave-form">
			<h6 style="text-align: center; font-style: normal; color: red; font-family: arial; font-size: 16px;">
			 	<?php 
				if (isset($msg)) {
					echo $msg;
				}
			 ?></h6>
			<div class="">
				<input type="hidden" name="did" value="<?php echo $_SESSION['did'] ?>">
			<label for="leave">Apply for leave </label><br>
			<input type="text" name="leave" id="leave"><br>
			<input type="submit" name="request" class="leave" value="Request">
		</div>
		</form>
	</body>
</html>