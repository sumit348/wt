<?php
	include 'CSS/bootstrap.php';
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
	$notification=nnotification($_SESSION['nid']);
?>
<html>
	<head>
		<title>
			Notification
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/doctorcss.css">
	</head>
	<button class="button"name="home"onclick="window.location='../control/LogoutControl.php'">Logout</button>
	<button type="button"name="home"class="button"onclick="window.location='NurseHomePage.php'">Home Page</button>
	<button class="button"onclick="window.location='NurseNotification.php'">Noification</button>
	<body>
		<div class="div1">
			<h2>Notification</h2>
		</div>
		<div class="table">
			<table class="table table-hover table-bordered ">
			  <thead>
			    <tr class="thead-dark">
					<th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody>
			  	 <?php foreach ($notification as $value) { ?>
			  		<tr>
						<td><?php echo $value['msg'] ?></td>
				    </tr>
			  	<?php } ?>
				    
			  </tbody>
			</table>
		</div>
	</body>
</html>