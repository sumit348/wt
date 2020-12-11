<?php
	include('../php/registrationCheck.php');
	include('../php/registerinsert.php');

	if(isset($_SESSION['name']))
	{
	header('Location: formSuccessfull.php');
	}
?>

<html>

<head></head>
<body>
<center>
<form method ="post" action="">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="600px">
				<fieldset>
					<legend><h3>REGISTRATION</h3></legend>
					Id<br/><input type="text" name="id"><?php echo $userIdError;?><br/>
					<hr>
					User Name<br/><input type="text" name ="name"><?php echo $nameError;?><?php echo $nameValid ;?><br/>
					<hr>
					Password<br/><input type="password" name ="password"><?php echo $passError;?><br/>
                    <hr>																				 
					Confirm Password<br/><input type ="password" name ="cpassword"><?php echo $cPassError;?><br/>
					<hr>
					Email<br/><input type="text" name ="email"><?php echo $emailErr;?><br/>
					<hr>
					DOB<br/><input type="date" name="dob"><?php echo $dobError;?><br/>
					<input type="submit" name="submit" value="Sign Up">
					<hr>
					<?php  echo $error; ?>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>
</body>
</html>		






		