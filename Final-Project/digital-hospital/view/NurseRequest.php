<?php
	include '../control/AdminControl.php';
	include 'CSS/bootstrap.php';
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
	//session ends

	$reqEquip=nurseSalary();
	$nreqEquip=nurseShift();
	$id=0;
	$idd=0;
?>
<html>
	<head>
		<title>
			Request
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/admincliniclist.css">
	</head>
	<body>
		<div class="div1">
			<label class="h2">Request</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>
		</div>
		<!-- For Doctor -->
		<div class="doctor-tbl">
			<h3>Nurse Salary</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Nurse Id</th>
						<th scope="col">Salary</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($reqEquip as $equip) { $id++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $id; ?></th>
					    	<!--<th><?php //echo $equip["id"]; ?></th>-->
							<td><?php echo $equip["nid"]; ?></td>
							<td><?php echo $equip["msg"]; ?></td>
							<td>
								<a href="../control/AdminControl.php?nsr=<?php echo $equip['nid'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?nsa=<?php echo $equip['nid'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
		
		<!-- For Nurse -->
		<div class="nurse-tbl">
			<h3>Nurse Shift</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Nurse Id</th>
						<th scope="col">Shift</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($nreqEquip as $val) { $idd++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $idd; ?></th>
					    	<!--<th><?php //echo $tempdoctor["id"]; ?></th>-->
							<td><?php echo $val["nid"]; ?></td>
							<td><?php echo $val["msg"]; ?></td>
							<td>
								<a href="../control/AdminControl.php?nshr=<?php echo $val['nid'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?nsha=<?php echo $val['nid'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
	</body>
</html>