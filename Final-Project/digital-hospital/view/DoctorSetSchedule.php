<?php
	include 'CSS/bootstrap.php';
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
	//session ends
	$id=0;
	$uid=$_SESSION['did'];
	$schedules=schedule($_SESSION['did']);
?>
<html>
	<head>
		<title>
			Doctor Set Schedule
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/doctorcss.css">
		<link rel="stylesheet"type="text/css"href="CSS/setschedule.css">
	</head>
	<body>
		<button class="button"onclick="window.location='../control/LogoutControl.php'">Logout</button>
		<button type="button"name="home"class="button"onclick="window.location='DoctorHomePage.php'">Home Page</button>
		<div class="div1">
			<h2>Set Schedule</h2>
		</div>
		<!--for slot 1-->
		<div class="div2">
			<label class="err"><?php echo $err_mgss; ?></label>
		<!-- 	<h3>Find Clinic</h3> -->
			<form method="post" action="../control/DoctorsControls.php">
				<div class="div3">
					<label>Your User Id</label><br>
					<input type="text" class="field" name="uid" value="<?php echo $_SESSION['did']; ?>"readonly><br>
					<label>Clinic Name</label><br>
					<input type="text" name="cname" id="cname" class="field" value="Digital Hospital" readonly>

					<label>Date</label><br> 
					<input type="date" name="date" id="date" class="field" required>

					<label>Time</label><br>
					<select class="field" name="time" id="time" required>
						<option value="">Time..</option>
						<option value="2-3">9-10</option>
						<option value="2-3">2-3</option>
						<option value="2-3">5-7</option>
						<option value="2-3">7-10</option>
					</select><br><br>
					<!--submit button here -->
					<input type="submit" name="slot1" class="submit" value="Add Clinic" >
					<!-- <button name="slot1"class="submit" onclick=location.href='../control/DoctorsControls.php'>Add Clinic</button> -->
				</div>
			</form>	
		</div>
		<div class="table">
		<table class="table table-hover table-bordered ">
			<thead>
			    <tr class="thead-dark">
					<th scope="col">SI#</th>
					<th scope="col">Clinic name</th>
					<th scope="col">Time</th>
					<th scope="col">Date</th>
					<th scope="col">Action</th>
			    </tr>
			</thead>
			  	<tbody>
			  		<?php foreach ($schedules as $value) {$id++;?>
			  			<tr>
			  				<td><?php echo $id ?></td>
			  				<td><?php echo $value['cname']?></td>
			  				<td><?php echo $value['time']?></td>
			  				<td><?php echo $value['date']?></td>
			  				<td>
								<a href="../control/DoctorsControls.php?schedule=<?php echo $value['id'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Delete</a>
							</td>
						</tr>
			  		<?php } ?>
						
			  	</tbody>
			</table>
		</div>
		<!--search bar & table ends-->
	</body>
</html>