<?php
    global $id;
   $id	= $_GET['id'];
	include('../php/updateCheck.php');
	
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
					<legend><h3>Update Info</h3></legend>
					User Name<br/><input type="text" name ="name"><br/>
					<hr>
					<hr>
					Email<br/><input type="text" name ="email"><br/>
					<hr>
					DOB<br/><input type="date" name="dob"><br/>
					<input type="submit" name="submit" value="Update">
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






		