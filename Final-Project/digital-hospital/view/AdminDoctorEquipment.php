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

	$reqEquip=doctorEquipment();
	$nreqEquip=nurseEquipment();
	$id=0;
	$idd=0;
?>
<html>
	<head>
		<title>
			Admin Equipment Request
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/admincliniclist.css">
	</head>
	<body>
		<div class="div1">
			<label class="h2">Equipment Request</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>
		</div>
		<!-- For Doctor -->
		<div class="doctor-tbl">
			<h3>Doctor Equipment Request</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Doctor Id</th>
						<th scope="col">Equipment</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($reqEquip as $equip) { $id++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $id; ?></th>
					    	<!--<th><?php //echo $equip["id"]; ?></th>-->
							<td><?php echo $equip["did"]; ?></td>
							<td><?php echo $equip["goods"]; ?></td>
							<td>
								<a href="../control/AdminControl.php?rejectE=<?php echo $equip['did'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?acceptE=<?php echo $equip['did'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
		
		<!-- For Nurse -->
		<div class="nurse-tbl">
			<h3>Nurse Request</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Nurse Id</th>
						<th scope="col">goods</th>
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
								<a href="../control/AdminControl.php?ndid=<?php echo $val['nid'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?naid=<?php echo $val['nid'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
	</body>
</html>