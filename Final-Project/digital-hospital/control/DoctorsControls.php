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
	$err_specialty="";
	$specialty="";
	$err_degree="";
	$degree="";
	$err_bmdcregno="";
	$bmdcregno="";
	$err_description="";
	$description="";
	$has_err=false;
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
		if(empty($_POST['specialty']))
		{
			$err_specialty="*select specialty";
			$has_err=true;
		}
		else
		{
			$specialty=htmlspecialchars($_POST['specialty']);
		}
		if(empty($_POST['degree']))
		{
			$err_degree="*enter degree";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z]*$/', $_POST['degree']))
		{
			$err_degree="Invalid input";
			$has_err=true;
		}
		else
		{
			$degree=htmlspecialchars($_POST['degree']);
		}
		if(empty($_POST['bmdcregno']))
		{
			$err_bmdcregno="*bmdcregno required";
			$has_err=true;
		}
		elseif(!preg_match('/^[0-9]*$/', $_POST['bmdcregno']))
		{
			$err_bmdcregno="*invalid bmdcregno";
			$has_err=true;
		}
		elseif(!(strlen($_POST['bmdcregno'])==10))
		{
			$err_bmdcregno="*10 digit number";
			$has_err=true;
		}
		else
		{
			$bmdcregno=htmlspecialchars($_POST['bmdcregno']);
		}
		if(strlen($_POST['description'])>200)
		{
			$err_pass="200 words maximum";
			$has_err=true;
		}
		else
		{
			$description=htmlspecialchars($_POST['description']);
		}
		//form validation ends

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
				$err_uid= "*user id not available";
			}
			elseif(mysqli_num_rows($result1)>0)
			{
				$err_uid= "*user id not available";
			}
			else
			{
				inserttempdoctor();
				echo "<script> alert('Successfully registered wait 24 hours ');window.location='Login.php' </script>";
			}
			//matching userid with database ends
		}
	}
	//insert into database query
function inserttempdoctor()
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
	global $specialty;
	global $degree;
	global $bmdcregno;
	global $description;
	$status=2;

	//insert into tempdoctorrequests table
	$dquery="INSERT INTO tempdoctorrequests VALUES (NULL,'$uid','$uname','$gender','$email','$number','$dob','$divission','$district','$thana','$specialty','$degree','$bmdcregno','$description')";
	//insert into tempusers table
	$uquery="INSERT INTO tempusers VALUES (NULL,'$uid','$pass_hash','$status')";

	execute($dquery); 
	execute($uquery); 
}

function doctorsdata($uid)
{
	//data retrieve fron patient table
	$dquery="SELECT * FROM doctors WHERE userid='$uid'";
	$dresults=getdata($dquery);
	return $dresults;
}
function doctoruser($uid)
{
	//data retrieve fron users table
	$uquery="SELECT password FROM users WHERE userid='$uid'";
	$uresults=getdata($uquery);
	return $uresults;
}

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
	$specialty=$_POST['specialty'];
	$degree=$_POST['degree'];
	$description=$_POST['description'];
	updatedoctor();
	echo "<script> alert('Successfully Updated');window.location='../view/DoctorProfile.php' </script>";
}

//Update
//update into database query
function updatedoctor()
{
	global $uid;
	global $uname;
	global $pass;
	global $number;
	global $divission;
	global $district;
	global $thana;
	global $specialty;
	global $degree;
	global $description;

	//update into patients table
	$dquery="UPDATE `doctors` SET `username`='$uname',`phonenumber`='$number',`divission`='$divission',`district`='$district',`thana`='$thana',`specialty`='$specialty',`degree`='$degree',`description`='$description' WHERE `userid`='$uid'";
	//update into users table
	$uquery="UPDATE users SET password='$pass' WHERE userid='$uid'";

	execute($dquery); 
	execute($uquery); 
}
//update ends
function divission()
{
	$query="SELECT * from divission";
	$results=getdata($query);
	return $results;
}
//insert into doctorsetschedule///
$err_mgss="";
$time="";
$date="";
$cid="";
$has=false;
if(isset($_POST['slot1']))
{
	if (empty($_POST['cname'])) {
		$err_mgss="Fill clinic";
		$has=true;
	}
	else
	{
		$cname=$_POST['cname'];
	}
	if (empty($_POST['time'])) {
		$err_mgss="Fill time";
		$has=true;
	}
	else
	{
		$time=$_POST['time'];
	}
	if (empty($_POST['date'])) {
		$err_mgss="Fill date";
		$has=true;
	}
	else
	{
		$date=$_POST['date'];
	}

	if(!$has)
	{
		$did=$_POST['uid'];
		$name=doc($did);
		foreach ($name as $value) {
			$dname=$value['username'];
		}
		$query="INSERT INTO `doctorsetschedule` VALUES (NULL,'$did','$dname','$cid','$cname','$time','$date')";
		execute($query);
		header("location:../view/DoctorSetSchedule.php");
		}
	
	}
//insert into doctorsetschedule///
function doc($did)
{
	$query="SELECT username FROM doctors WHERE userid='$did'";
	$results=getdata($query);
	return $results;
}
function schedule($did)
{
	$query="SELECT * FROM doctorsetschedule WHERE did='$did'";
	$results=getdata($query);
	return $results;
}
if (isset($_GET['schedule'])) 
{
	$id=$_GET['schedule'];
	$query="DELETE FROM `doctorsetschedule` WHERE id='$id'";
	execute($query);
	header('location:../view/DoctorSetSchedule.php');
}
function patientschedule($did)
{
	$query="SELECT * FROM patientrequest WHERE did='$did'";
	$results=getdata($query);
	return $results;
}
function patientsetschedule($prid)
{
	$query="SELECT * FROM patientrequest WHERE id='$prid'";
	$results=getdata($query);
	return $results;
}
///doctor accept request////
if (isset($_GET['prid'])) {
	$prid=$_GET['prid'];
	$watings=patientsetschedule($prid);
	foreach ($watings as $value) {
		
		$pid=$value['pid'];
		$pname=$value['pname'];
		$did=$value['did'];
		$dname=$value['dname'];
		$cid=$value['cid'];
		$cname=$value['cname'];
		$time=$value['time'];
		$date=$value['date'];
		$divission=$value['divission'];
		$district=$value['district'];
		$thana=$value['thana'];
	}
	$query="INSERT INTO `patientwaiting` VALUES (NULL,'$pid','$pname','$did','$dname','$cid','$cname','$time','$date','$divission','$district','$thana')";
	execute($query);
	deleterequest($prid);
	header('location:../view/DoctorPatientWaiting.php');
	$notification="INSERT INTO `notification` VALUES (NULL,'$pid','$did','$dname','$cname','$time','$date','You are appointed')";
	execute($notification);
}
///doctor accept request ends////

function deleterequest($prid)
{
	$query="DELETE FROM `patientrequest` WHERE id='$prid'";
	execute($query);
}

//patient request reject//
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$reject=patientsetschedule($delid);
	foreach ($reject as $value) 
	{
	$pid=$value['pid'];
	$pname=$value['pname'];
	$did=$value['did'];
	$dname=$value['dname'];
	$cid=$value['cid'];
	$cname=$value['cname'];
	$time=$value['time'];
	$date=$value['date'];
	$divission=$value['divission'];
	$district=$value['district'];
	$thana=$value['thana'];
	}
	deleterequest($delid);
	header('location:../view/DoctorPatientRequest.php');
	$notification="INSERT INTO `notification` VALUES (NULL,'$pid','$did','$dname','$cname','$time','$date','You are Rejected')";
	execute($notification);
}
//patient request reject ends//

function patientlist($did)
{
	$query="SELECT * FROM `patientwaiting` WHERE did='$did'";
	$results=getdata($query);
	return $results;
}
if (isset($_GET['wpid'])) {
	$wpid=$_GET['wpid'];
	deletewating($wpid);
	header('location:../view/DoctorPatientWaiting.php');

}
function deletewating($wpid)
{
	$query="DELETE FROM `patientwaiting` WHERE id='$wpid'";
	execute($query);
}
function testclinics()
{
	$test="SELECT * FROM testclinic";
	$results=getdata($test);
	return $results;
}
function diseases()
{
	$diseases="SELECT * FROM diseases";
	$results=getdata($diseases);
	return $results;
}
///prescrive insert here///
if (isset($_POST['prescrive'])) {
	$did=$_POST['did'];
	$pid=$_POST['pid'];
	$pname=$_POST['pname'];
	$pno=$_POST['pno'];
	///data from patientwaiting table//
	$wait=waitingpatient($pno);
	foreach ($wait as $value) {
		$dname=$value['dname'];
		$cid=$value['cid'];
		$cname=$value['cname'];
		$time=$value['time'];
		$date=$value['date'];
	}
	///data from patientwaiting table//
	$symtom=$_POST['symtom'];
	$diseases=$_POST['diseases'];
	$test=$_POST['test'];
	$tcname=$_POST['tcname'];
	$report=$_POST['report'];
	$medicines=$_POST['medicines'];
	$records="INSERT INTO `patientrecords` VALUES (NULL,'$did','$dname','$pid','$pname','$cid','$cname','$time','$date','$symtom','$diseases','$test','$tcname','$report','$medicines')";
	execute($records);
	deletewating($pno);
	header('location:../view/DoctorPatientRecords.php');
}
function waitingpatient($pno)
{
	$no="SELECT * FROM `patientwaiting` WHERE id='$pno'";
	$results=getdata($no);
	return $results;
}
///prescrive insert edns///
//data retrieve from patient records table starts///
function patientrecords($did)
{
	$records="SELECT * FROM `patientrecords` WHERE did='$did'";
	$results=getdata($records);
	return $results;
}
//data retrieve from patient records table ends///
///update into patientrecords table starts//
if (isset($_POST['edit'])) 
{
	$pno=$_POST['pno'];
	$symptom=$_POST['symtom'];
	$diseases=$_POST['diseases'];
	$test=$_POST['test'];
	$tcname=$_POST['tcname'];
	$report=$_POST['report'];
	$medicines=$_POST['medicines'];
	$update="UPDATE `patientrecords` SET `symptom`='$symptom',`diseases`='$diseases',`test`='$test',`testclinic`='$tcname',`report`='$report',`medicines`='$medicines' WHERE id='$pno'";
	execute($update);
	header('location:../view/DoctorPatientRecords.php');
}
///update into patientrecords table ends//
/*equipment insert*/
$msg1="";
$equipment="";
if (isset($_POST['goods'])) {
	$equipment = $_POST['goods'];
	$did = $_POST['did'];
	if (empty($equipment)) {
		return $msg1 = "empty field";
	}else{
		$sql = "INSERT INTO `equipment`(`id`, `did`, `goods`) VALUES (NULL,'$did','$equipment')";
		execute($sql);
		$msg1="requested Successfully";
	}
	
	
}

$msg="";
$leave="";
/*leave request*/
if (isset($_POST['request'])) {
	$leave = $_POST['leave'];
	$did = $_POST['did'];
	if (empty($leave)) {
		return $msg = "empty field";
	}else{
		$sql = "INSERT INTO `vacation`(`id`, `did`, `msg`) VALUES (NULL,'$did','$leave')";
		execute($sql);
		$msg="requested Successfully";
	}
	
	
}
/*reterive data from vaction table*/

//notification table retrieve
function dnotification($did)
{
	$notification="SELECT * FROM `dnotification` WHERE did IN('$did','bulbul')";
	$results=getdata($notification);
	return $results;
}

?>