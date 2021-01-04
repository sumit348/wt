<?php
include '../control/NurseControl.php';
	//session starts
	session_start();
	if(isset($_SESSION['nid']))
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
	//session ends
	global $id;
	$id = $_SESSION['nid'];
	include('../control/nnamecheck.php');
?>
<html>
	<head>
		<title>
		Nurse Home Page
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/doctorcss.css">
		<link rel="stylesheet"type="text/css"href="CSS/doctorhomepage.css">
	</head>
	<body>
		<button class="button"onclick="window.location='../control/LogoutControl.php'">Logout</button>
		<button class="button"onclick="window.location='NurseNotification.php'">Noification</button>
		<div class="div1">
			<h2>Home Page</h2>
		</div>
		<label class="l1">Welcome Nurse :<?php echo $_SESSION['nid'] ?><label>
			<center>
	    <h4>	
	     <?php
		    if(isset($_COOKIE['nname'])){
		    	echo "User Name:" .$_COOKIE['nname'];
		    }
		 ?>
		</h4>
		</center>
		<div class="sidebar">                   <!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav_dropdown-->
			<a href="NurseProfile.php">Profile</a>
			<a href="NurseSalary.php">Salary</a>

		</div>

		<div class="div2">
			<form method="POST" action="" class="leave-form">
			
			 
				<div class="">
					<input type="hidden" name="nid" value="<?php echo $_SESSION['nid'] ?>">
					<label for="e_request">Equipment Request </label><br>
					<input type="text" name="e_request" id="e_request" required><br>
					<input type="submit" name="equipment" class="leave" value="Equipment">
				</div>
			</form>

			<form method="POST" action="" class="leave-form">
				<h6>
				 	<?php 
					if (isset($msg3)) {
						echo $msg3;
					}
				 ?></h6>
				<div class="">
					<input type="hidden" name="nid" value="<?php echo $_SESSION['nid'] ?>">
				<label for="n_leave">Request For Leave </label><br>
				<input type="text" name="n_leave" id="n_leave" required=""><br>
				<input type="submit" name="request" class="leave" value="Request">
			</div>
			</form>
		</div>

		<div class="div3">
			<form method="POST" action="" class="leave-form">
			
			 <h6>
			 	<?php 
				if (isset($msg4)) {
					echo $msg4;
				}
			 ?></h6>
			<div class="">
				<input type="hidden" name="nid" value="<?php echo $_SESSION['nid'] ?>">
			<label for="n_shift"> Shift Change </label><br>
			<input type="text" name="n_shift" id="n_shift" required=""><br>
			<input type="submit" name="shift" class="leave" value="Shift-Change">
		</div>
		</form>

		<form method="POST" action="" class="leave-form">
			<h6>
			 	<?php 
				if (isset($msg5)) {
					echo $msg5;
				}
			 ?></h6>
			<div class="">
				<input type="hidden" name="nid" value="<?php echo $_SESSION['nid'] ?>">
			<label for="n_salary">Request For Salary </label><br>
			<input type="text" name="n_salary" id="n_salary" required=""><br>
			<input type="submit" name="salary" class="leave" value="Request-Salary">
		</div>
		</form>
		</div>
	</body>
</html>