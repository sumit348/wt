<!DOCTYPE HTML>
	<head>
		<title>Change Password</title>
	</head>
	<body>
	<form method="post" action="rechangepassword.php">
		<div>
		<form method="post">
			<table border="1">	
					</tr>
						<td colspan ="2" width ="100%" height="50px" align="center"><h1>Welcome to Your Profile</h1></td>
					</tr>
					</tr>
						<td height ="400"><b align="left"><h1>Account</h1></b>
							<hr>
							<ul>
								<li><a href="editProfile.php"><h3>Edit Profile</h3></a></li>
								<li><a href="changePassword.php"><h3>Change Password</h3></a></li>
								<li><a href="../control/logout.php"><h3>Logout</h3></a></li>
							</ul>
						</td>
						<td width ="1200px" height ="700px">
							<fieldset>	
								<legend><h5>Change Password</h5></legend>
								<table align="center">
									<tr>
										<td>Current Password:</td>
										<td><input type ="text" name = "pass" method ="post"></td>
										<td></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>New Password:</td>
										<td><input type ="password" name ="cpass" method =""></td>
										<td></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>Re-type New Passwprd:</td>
										<td><input type="password" name="rpass" /></td>
										<td></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
									<tr>
											<td></td>
											<td><input type ="submit" value ="Submit" name="submit"></td>
											<td></td>
										</tr>
								</table>
							</fieldset>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><h4>Copyright from w3school.com<h4></td>
					</tr>
			</table>
	<form>	
		</div>
	</body>
</html>