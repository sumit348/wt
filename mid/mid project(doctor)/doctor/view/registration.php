<?php
	include('../control/registrationCheck.php');
	session_start();
	$error="";
	$dip="";
	$us="";
		
		
    if(isset($_REQUEST['submit'])){	
		
        if(!empty($_REQUEST['name']) && !empty($_REQUEST['password']) && !empty($_REQUEST['cpassword']) && !empty($_REQUEST['gender']) && !empty($_REQUEST['phone']) && !empty($_REQUEST['email'])  &&  !empty($_REQUEST['id'])){
			if($pass == $cPass){
			
			//$dip = $_REQUEST['gender'];
			//$user = $_REQUEST['user'];
				
            $info = $_REQUEST['name']."|". $_REQUEST['email']."|".$_REQUEST['id']."|".$_REQUEST['password']. "|".$_REQUEST['cpassword']."|".$_REQUEST['phone']."\n";
            $myfile = fopen("registrationfile.txt", "w");
            fwrite($myfile, $info);
            fclose($myfile);
            echo "Registration successfully done!";   
        }
        
		}
        else{
            $error = "Check and fill up the all field!";
            
        }
		
    
		
		
	}
?>

<html>

<head></head>
<title>Registration</title>
<body>
<center>
<form method ="post" action="">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="600px">
				<fieldset>
					<legend><h3>REGISTRATION</h3></legend>
					Name<br/><input type="text" name ="name"><?php echo $nameError;?><?php echo $nameValid ;?><br/>
					<hr>
					Email<br/><input type="text" name ="email"><?php echo $emailErr;?><br/>
					<hr>
					Id<br/><input type="text" name="id"><?php echo $userIdError;?><br/>
					<hr>
					Password<br/><input type="password" name ="password"><?php echo $passError;
																				echo $validPass?><br/>
                    <hr>																				 
					Confirm Password<br/><input type ="password" name ="cpassword"><?php echo $cPassError;?><br/>
					<hr>
					
					
					Gender<br/><input type="radio" name="gender" value="Male" >male
					           <input type="radio" name="gender" value ="Female">female
					           <input type="radio" name="gender" value ="Others"> others<?php echo $genderError;?><br/>
					<hr/>
					phone<br/><input type="text" name="phone"><?php echo $noError;?><br/>
					<input type="submit" name="submit" value="Sign Up">
					<a href="../index.php">Sign In</a>
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






		