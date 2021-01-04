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

	$tempdoctors=leavedoctor();
	$nurse=leavenurse();
	//$equipment=equipments();
	$id=0;
	$idd=0;
?>
<html>
	<head>
		<title>
			Admin Doctor Request
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/admincliniclist.css">
	</head>
	<body>
		<div class="div1">
			<label class="h2">Leave Applocation</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>
		</div>
		<!-- For Doctor -->
		<div class="doctor-tbl">
			<h3>Doctor Leave</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Doctor Id</th>
						<th scope="col">Message</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($tempdoctors as $tempdoctor) { $id++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $id; ?></th>
					    	<!--<th><?php //echo $tempdoctor["id"]; ?></th>-->
							<td><?php echo $tempdoctor["did"]; ?></td>
							<td><?php echo $tempdoctor["msg"]; ?></td>
							<td>
								<a href="../control/AdminControl.php?lidd=<?php echo $tempdoctor['did'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?liad=<?php echo $tempdoctor['did'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
		
		<!-- For Nurse -->
		<div class="nurse-tbl">
			<h3>Nurse Leave</h3>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Nurse Id</th>
						<th scope="col">Message</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($nurse as $val) { $idd++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $idd; ?></th>
					    	<!--<th><?php //echo $tempdoctor["id"]; ?></th>-->
							<td><?php echo $val["nid"]; ?></td>
							<td><?php echo $val["msg"]; ?></td>
							<td>
								<a href="../control/AdminControl.php?nld=<?php echo $val['nid'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Reject</a>

								<a href="../control/AdminControl.php?nla=<?php echo $val['nid'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		</div>
		
	</body>
</html>