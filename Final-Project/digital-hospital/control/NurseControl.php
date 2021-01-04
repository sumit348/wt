<?php 
	include '../model/db_connect.php';
	//form validation starts 
	$err_uid="";
	$uid="";
	$err_uname="";
	$uname="";
	$err_pass="";
	$pass="";
	$err_gender="";
	$gender="";
	$err_email="";
	$email="";
	$err_number="";
	$number="";
	$err_dob="";
	$dob="";
	$err_address="";
	$divission="";
	$district="";
	$thana="";
	$err_bloodgroup="";
	$bloodgroup="";
	$has_err=false;
	$click="";
	$pass_hash="";
	
	if(isset($_POST['submit']))
	{
	

		if(empty($_POST['uid']))
		{
			$err_uid="*user id required";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z 0-9]*$/', $_POST['uid']))
		{
			$err_uid="Invalid input";
			$has_err=true;

		}
		else
		{
			$uid=htmlspecialchars($_POST['uid']);
		}
		if(empty($_POST['uname']))
		{
			$err_uname="*user name required";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z ]*$/', $_POST['uname']))
		{
			$err_uname="Invalid input";
			$has_err=true;
		}
		else
		{
			$uname=htmlspecialchars($_POST['uname']);
		}
		if(empty($_POST['pass']))
		{
			$err_pass="*password required";
			$has_err=true;
		}
		elseif(strlen($_POST['pass'])<4)
		{
			$err_pass="password minimum 4 digit";
			$has_err=true;
		}
		else
		{
			$pass=htmlspecialchars($_POST['pass']);
			$pass_hash=password_hash($pass, PASSWORD_DEFAULT);
		}
		
		if(empty($_POST['gender']))
		{
			$err_gender="*select gender";
			$has_err=true;
		}
		else
		{
			$gender=htmlspecialchars($_POST['gender']);
		}
		if(empty ($_POST['email']))
		{
			$err_email="*email required";
			$has_err=true;
		}
		elseif(!strpos(($_POST['email']),"@"))
		{
			$err_email="*Invalid Email";
			$has_err=true;
		}
		elseif(!strpos(($_POST['email']),"."))
		{
			$err_email="*Invalid Email";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z 0-9 . @]*$/', $_POST['email']))
		{
			$err_email="*Invalid Email";
			$has_err=true;
		}
		else
		{
			$email=htmlspecialchars($_POST['email']);
		}
		if(empty($_POST['number']))
		{
			$err_number="*number required";
			$has_err=true;
		}
		elseif(!preg_match('/^[0-9]*$/', $_POST['number']))
		{
			$err_number="*invalid number";
			$has_err=true;
		}
		elseif(!(strlen($_POST['number'])==11))
		{
			$err_number="*11 digit number";
			$has_err=true;
		}
		else
		{
			$number=htmlspecialchars($_POST['number']);
		}
		if(empty($_POST['dob']))
		{
			$err_dob="*fill this field";
			$has_err=true;
		}
		else
		{
			$dob=htmlspecialchars($_POST['dob']);
		}
		if(empty($_POST['divission']))
		{
			$err_address="*fill full address";
			$has_err=true;
		}
		else
		{
			$divission=htmlspecialchars($_POST['divission']);
		}
		if(empty($_POST['district']))
		{
			$err_address="*fill full address";
			$has_err=true;
		}
		else
		{
			$district=htmlspecialchars($_POST['district']);
		}
		if(empty($_POST['thana']))
		{
			$err_address="*fill full address";
			$has_err=true;
		}
		else
		{
			$thana=htmlspecialchars($_POST['thana']);
		}
		if(empty($_POST['bloodgroup']))
		{
			$err_bloodgroup="*select bloodgroup";
			$has_err=true;
		}
		else
		{
			$bloodgroup=htmlspecialchars($_POST['bloodgroup']);
		}
		//insert into database use function
		if (!$has_err) 
		{
			//matching userid with database
			$query="SELECT userid FROM users WHERE userid='$uid'";
			$query1="SELECT userid FROM tempusers WHERE userid='$uid'";
			$result=execute($query);
			$result1=execute($query1);
			if(mysqli_num_rows($result)>0)
			{
				$err_uid= "user id not available";
			}
			elseif(mysqli_num_rows($result1)>0)
			{
				$err_uid= "*user id not available";
			}
			else
			{
				//insert into patients & users table
				insertnurse();
				echo "<script> alert('Successfuly registered wwait 24 hours');window.location='Login.php' </script>";
			}
			//matching userid with database ends
		}
	}
	
//insert into database query
function insertnurse()
{
	global $uid;
	global $uname;
	global $pass_hash;
	global $gender;
	global $email;
	global $number;
	global $dob;
	global $divission;
	global $district;
	global $thana;
	global $bloodgroup;
	$status=5;

	//insert into patients table
	$pquery="INSERT INTO tempnursereq VALUES (NULL,'$uid','$uname','$gender','$email','$number','$dob','$bloodgroup','$divission','$district','$thana')";
	//insert into users table
	$uquery="INSERT INTO tempnusers VALUES (NULL,'$uid','$pass_hash','$status')";

	execute($pquery); 
	execute($uquery); 
}
function divission()
{
	$query="SELECT * from divission";
	$results=getdata($query);
	return $results;
}
function nursesdata($uid)
{
	//data retrieve fron patient table
	$pquery="SELECT * FROM nurses WHERE userid='$uid'";
	$presults=getdata($pquery);
	return $presults;
}

function nurseuser($uid)
{
	//data retrieve fron users table
	$uquery="SELECT password FROM users WHERE userid='$uid'";
	$uresults=getdata($uquery);
	return $uresults;
}
/*notification sent*/
/*equipment insert*/
$msg1="";
$equipment="";
if (isset($_POST['ngoods'])) {
	$equipment = $_POST['ngoods'];
	$did = $_POST['did'];
	if (empty($equipment)) {
		return $msg1 = "empty field";
	}else{
		$sql = "INSERT INTO `nequipment`(`id`, `nid`, `msg`) VALUES (NULL,'$did','$equipment')";
		execute($sql);
		$msg1="requested Successfully";
	}
	
	
}

$msg="";
$leave="";
/*leave request*/
if (isset($_POST['nleave'])) {
	$leave = $_POST['nleave'];
	$did = $_POST['did'];
	if (empty($leave)) {
		return $msg = "empty field";
	}else{
		$sql = "INSERT INTO `nursevacation`(`id`, `nid`, `msg`) VALUES (NULL,'$did','$leave')";
		execute($sql);
		$msg="requested Successfully";
	}
}
	


$e_request="";
if (isset($_POST['equipment'])) {
	$nid = $_POST['nid'];
	$e_request = $_POST['e_request'];

	$sql = "INSERT INTO `nequipment`(`id`, `nid`, `msg`) VALUES (NULL,'$nid','$e_request')";
	execute($sql);

}
$n_leave="";
if (isset($_POST['request'])) {
	$nid = $_POST['nid'];
	$n_leave = $_POST['n_leave'];

	$sql = "INSERT INTO `nursevacation`(`id`, `nid`, `msg`) VALUES (NULL,'$nid','$n_leave')";
	execute($sql);

}
$n_shift="";
if (isset($_POST['shift'])) {
	$nid = $_POST['nid'];
	$n_shift = $_POST['n_shift'];

	$sql = "INSERT INTO `nshift`(`id`, `nid`, `msg`) VALUES (NULL,'$nid','$n_shift')";
	execute($sql);

}
$n_salary="";
if (isset($_POST['salary'])) {
	$nid = $_POST['nid'];
	$n_salary = $_POST['n_salary'];

	$sql = "INSERT INTO `nsalaryrreq`(`id`, `nid`, `msg`) VALUES (NULL,'$nid','$n_salary')";
	execute($sql);

}
function nnotification($nid)
{
	$notification="SELECT * FROM `nnotification` WHERE nid IN('$nid','bulbul')";
	$results=getdata($notification);
	return $results;
}
/*nurse update*/
if(isset($_POST['update']))
{
	//patient update own profile
	$uid=($_GET['uid']);
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$pass=password_hash($pass, PASSWORD_DEFAULT);
	$number=$_POST['number'];
	$divission=$_POST['divission'];
	$district=$_POST['district'];
	$thana=$_POST['thana'];
	updatenurse();
	echo "<script> alert('Successfully Updated');window.location='../view/NurseProfile.php' </script>";
}
function updatenurse()
{
	global $uid;
	global $uname;
	global $pass;
	global $number;
	global $divission;
	global $district;
	global $thana;

	//update into nurse table
	$aquery="UPDATE `admin` SET `username`='$uname',`phonenumber`='$number',`divission`='$divission',`district`='$district',`thana`='$thana' WHERE `userid`='$uid'";
	$nquery="UPDATE `nurses` SET `username`='$uname',`phonenumber`='$number',`divission`='$divission',`district`='$district',`thana`='$thana' WHERE `userid`='$uid'";
	//update into users table
	$uquery="UPDATE users SET password='$pass' WHERE userid='$uid'";

	execute($aquery); 
	execute($nquery); 
}

 ?>