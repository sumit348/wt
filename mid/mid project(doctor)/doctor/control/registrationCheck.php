<?php
	
		$name =  $email = $id = $pass = $cpass = $user =  $gender = $phone = "";
		 $emailPut="";
		 $phonePut="";
		  $nameError ="";
		  $userIdError ="";
		  $emailErr ="";
		  $passError ="";
		  $cPassError ="";
		  $validPass ="";
		  $genderError ="";
		  $noError ="";
		  $userError ="";
		  $numberrError ="";
		  $nameValid="";
		  
		  
		if (isset($_POST['submit']))
		{
		  
		  $name = $_POST["name"];
		  $userId = $_POST["id"];
		  $email = $_POST["email"];
		  //$user = $_POST["user"];
		  $pass = $_POST["password"];
		  $cPass = $_POST["cpassword"];
		  $phone = $_POST["phone"];
		 
		  $len = strlen($name);
		  if($name == NULL || $len<3)
		   {
			$nameValid = "empty name field or short length of name";
		   }
		   

		   elseif($len >= 3 && $name[0]>='A' && $name[0]<='Z' || $name[0]>='a'&& $name[0]<='z')
		   {
				for($i = 1; $i<$len; $i++)
			   {
					 if($name>='A'&& $name<='Z' || $name>='a'&& $name<='z' || $name=='.' || $name=='-' )
					 {
						  $nameValid;
					 }

					 else {
						 $nameValid = "name is invalid";
					 }
			   }

		   }
		     else {
                   $nameValid ="invalid name";
                  }
		
		   $pos =strpos($email, '@');
		   $pos1 = strpos($email, ".com");

		   if($email == NULL)
		   {
			$emailErr =  "empty email field!";
		   }

		   elseif ($pos!=False && $pos1!=False && $pos1 > $pos) {
				  
					 $email;
		   }
		   else {
			   $emailErr = "Invalid Email!";
		   }
		
		if (empty($userId))
		{
			$userIdError = "fill up the field";
		}
		
		if (empty($pass))
		{
			$passError = "Set the Password";
		}
		
		if (empty($cPass))
		{
			$cPassError = "Set the Confirm Password";
		}
		
		else{
			echo $validPass = "";
		}
		if($pass != $cPass)
		{
			$validPass = "password doesnot match";
		}
		
		if (empty($_POST["user"]))
		{
			$userError = "Seclect the User";
		}
		
		if (empty($_POST["gender"]))
		{
			$genderError = "Seclect the Gender";
		}
		
		if(isset($phone))
			{
				 
				 $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
				 $phone_to_check = str_replace("-", "", $filtered_phone_number);				 
				 if (strlen($phone_to_check) == 11) {
					$phonePut = $phone;
					
				 }
				  else {
				  $noError = "you have to put valid phone Number";
				 }
			}
		
		if (empty($phone))
		{
			$noError = "Mobile Number is required";
		}
		else if (!is_numeric($phone))
		{
			$number = "";
			$numberrError = "Please Enter Valid Number";
		}
		else{
			$numberrError ="";
		}
		
		}	
		?>