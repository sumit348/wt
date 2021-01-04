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

	$tempnurses=tempnursedata();
	$id=0;
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
			<label class="h2">Nurse Request List</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>
		</div>
		<div class="table">
			<table class="table table-hover table-bordered ">
				<thead>
				    <tr class="thead-dark">
						<th scope="col">SI#</th>
						<th scope="col">Userid</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">Phone no.</th>
						<th scope="col">Divission</th>
						<th scope="col">District</th>
						<th scope="col">Thana</th>
						<th scope="col">Actions</th>
				    </tr>
				</thead>
				<?php foreach ($tempnurses as $tempnurse) { $id++;?>
					<tbody>
					    <tr>
					    	<th><?php echo $id; ?></th>
							<td><?php echo $tempnurse["userid"]; ?></td>
							<td><?php echo $tempnurse["username"]; ?></td>
							<td><?php echo $tempnurse["email"]; ?></td>
							<td><?php echo $tempnurse["phonenumber"]; ?></td>
							<td><?php echo $tempnurse["divission"]; ?></td>
							<td><?php echo $tempnurse["district"]; ?></td>
							<td><?php echo $tempnurse["thana"]; ?></td>							
							<td>
								<a href="../control/AdminControl.php?tndel=<?php echo $tempnurse['userid'] ?>" class="btn btn-danger float-right"style="width: 70px" onclick="return confirm ('Are you sure to delete?');">Delete</a>

								<a href="../control/AdminControl.php?tnacc=<?php echo $tempnurse['userid'] ?>" class="btn btn-primary float-right"style="width: 70px" onclick="return confirm ('Are you sure to accept?');">Accept</a>
							</td>
					    </tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
	</body>
</html>