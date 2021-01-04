<?php
	//session starts
	session_start();
	if(isset($_SESSION['aid']))
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
	$id = $_SESSION['aid'];
	//echo $id;

	//session ends
	include('../control/namecheck.php');
?>
<html>
	<head>
		<title>
			Admin Home Page
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/adminhomepage.css">
		<link rel="stylesheet"type="text/css"href="CSS/admincliniclist.css">
	</head>
	<body>
		<div class="head">
			<label class="l1">Welcome Admin</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<!--<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>-->
			<button type="button"class="adminbtn"onclick="window.location='AdminProfile.php'">Profile</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminNotice.php'">Notice</button>
		</div>
		<label class="l2">Admin userid : <?php echo $_SESSION['aid'] ?></label>
		<center>
	    <h3>	
	     <?php
		    if(isset($_COOKIE['name'])){
		    	echo "User Name:" .$_COOKIE['name'];
		    }
		 ?>
		</h3>
		</center>
		<div id="admin-navbar"style="text-align:center">
			<div class="dropdown">
				<button class="dropbtn">Doctor</button>
				<div class="dropdown-content">
					<a href="AdminDoctorList.php">Doctors List</a>
					<a href="AdminDoctorRequest.php">Doctor's Request</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Patient</button>
				<div class="dropdown-content">
			    <a href="AdminPatientList.php">Patient List</a>
			    <a href="AdminPatientHistory.php">Patient History</a>
			  </div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Nurse</button>
				<div class="dropdown-content">
			    <a href="AdminNurseList.php">Nurse List</a>
			    <a href="AdminNurseRequest.php">Nurse Request</a>
			  </div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Request</button>
				<div class="dropdown-content">
				    <a href="AdminDoctorLeave.php">Leave Application</a>
				    <a href="AdminDoctorEquipment.php">Equipment Request</a>
				    <a href="NurseRequest.php">Request</a>
			    </div>
			</div>
		</div>
	</body>
</html>