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
	$id=0;
?>
<html>
	<head>
		<title>
			Notice
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/admincliniclist.css">
		<script>
			
			function validated(){


				var text = document.getElementById("text").value;

				if(text=="")
				{
					alert("Empty field");
				}
				else{
					alert("Notice Sent");
				}
			}
		</script>
	</head>
	<body>
		<div class="div1">
			<label class="h2">Notice</label>
			<button class="adminbtn"onclick="window.location='../control/LogoutControl.php'">Logout</button>
			<button type="button"class="adminbtn"onclick="window.location='AdminHomePage.php'">Home</button>
		</div>
		
		<div class="notice">
			
		<form method="POST" action="" onsubmit="return validated()">
			<h6>
			 	<?php 
				if (isset($msg)) {
					echo $msg;
				} ?>
					
			</h6>
			<div>
				<input type="hidden" name="aid" value="<?php echo $_SESSION['aid'] ?>">
				<label for="notice">Notice </label><br>
				<textarea class="notice-field" id="text" name="field" rows="8" cols="50" ></textarea>

				<input type="submit" name="send" class="send" value="Send">
			</div>
		</form>
		</div>
	</body>
</html>