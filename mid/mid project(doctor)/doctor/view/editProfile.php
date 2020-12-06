<!DOCTYPE HTML>
	<head>
		<title>Edit Profile</title>
	</head>
	<body>
	<form method="post" action="editconfirm.php">
		<div>
			<table border="1">	
					</tr>
						<td colspan ="2" width ="100%" height="50px" align="center"><h1>Welcome to Your Profile</h1></td>
					</tr>
					</tr>
						<td><ul>
								<li><a href="editProfile.php"><h3>Edit Profile</h3></a></li>
								<li><a href="changePassword.php"><h3>Change Password</h3></a></li>
								<li><a href="../control/logout.php"><h3>Logout</h3></a></li>
							</ul>
						</td>
						<td width ="1200px" height ="700px">
							<fieldset>	
								<legend><h5>Edit Profile</h5></legend>
								<table align="center">
									<tr>
										<td>Name:</td>
										<td></td>
										<td><input type ="text" name = "mname" method ="post"></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>User Id:</td>
										<td></td>
										<td><input type ="text" name = "userId" method ="post"></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>Email:</td>
										<td></td>
										<td><input type ="email" name ="memail" method ="post"><button title ="hints:sample@com"><b>i</b></button></td>
									</tr>
									<tr><td colspan="4"><hr></td></tr>
									<tr>
										<td>Gender:</td>
										<td><input type ="radio" name ="gender" value ="male" method ="post">Male</td>
										<td>
										<input type ="radio" name ="gender" value ="female" method ="post">Female
										<input type ="radio" name ="gender" value ="female" method ="post">Others
										</td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>Blood Group:</td>
										<td></td>
										<td>
											<select name="bloodgroup">
											  <option value="">-- select one --</option>
											  <option value=" A positive">A+</option>
											  <option value="A Negetive">A-</option>
											  <option value="B positive">B+</option>
											  <option value="B negetive">B-</option>
											  <option value="O positive">O+</option>
											  <option value="O Negetive">O-</option>
											</select>  
										</td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>Phone Number:</td>
										<td></td>
										<td><input type="tel" name="mphone" method ="post"></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td>Date Of Birth:</td>
										<td></td>
										<td><input type ="date" name ="date" method ="post"></td>
									</tr>
									<tr><td colspan="3"><hr></td></tr>
									<tr>
										<td><input type="submit" value ="Send"</td>
										<td></td>
										<td><input type ="reset"  value ="Reset"></td>
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
		</div>
	</body>
</html>