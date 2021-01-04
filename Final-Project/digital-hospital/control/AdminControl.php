<?php
	include '../model/db_connect.php';
	//validation clinic starts
	$err_cid="";
	$cid="";
	$err_cname="";
	$cname="";
	$err_pass="";
	$pass="";
	$err_number="";
	$number="";
	$err_address="";
	$divission="";
	$district="";
	$thana="";
	$has_err=false;

	if(isset($_POST['submit']))
	{
		if(empty($_POST['cid']))
		{
			$err_cid="*user id required";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z 0-9]*$/', $_POST['cid']))
		{
			$err_cid="Invalid input";
			$has_err=true;
		}
		else
		{
			$cid=htmlspecialchars($_POST['cid']);
		}
		
		if(empty($_POST['cname']))
		{
			$err_cname="*user name required";
			$has_err=true;
		}
		elseif(!preg_match('/^[a-z A-Z ]*$/', $_POST['cname']))
		{
			$err_cname="Invalid input";
			$has_err=true;
		}
		else
		{
			$cname=htmlspecialchars($_POST['cname']);
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
			$pass=password_hash($pass, PASSWORD_DEFAULT);
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
		//insert into database use function
		if (!$has_err) 
		{
			//matching userid with database
			$query="SELECT userid FROM users WHERE userid='$cid'";
			$result=execute($query);
			if(mysqli_num_rows($result)>0)
			{
				$err_cid= "*user id not available";
			}
			else
			{
				//insert into patients & users table
				insertclinic();
				echo "<script> alert('Successfuly registered');window.location='../view/AdminClinicList.php' </script>";
			}
			//matching userid with database ends
		}
	}
	//validation clinic ends




function insertclinic()
{
	global $cid;
	global $cname;
	global $pass;
	global $number;
	global $divission;
	global $district;
	global $thana;
	$status=4;

	//insert into clinics table
	$cquery="INSERT INTO clinics VALUES (NULL,'$cid','$cname','$number','$divission','$district','$thana')";
	//insert into users table
	$uquery="INSERT INTO users VALUES (NULL,'$cid','$pass','$status')";

	execute($cquery); 
	execute($uquery); 
}
//data retrieve fron clinics table starts
function clinicsdata()
{
	$cquery="SELECT * FROM clinics";
	$cresults=getdata($cquery);
	return $cresults;
}
//data retrieve fron clinics table ends

//delete patient starts
if(isset($_GET['cid']))
{
	$cid=$_GET['cid'];

	deleteclinic($cid);
	header("location:../view/AdminClinicList.php");
}
function deleteclinic($cid)
{
	$cdelete="DELETE FROM `clinics` WHERE cid='$cid'";
	$udelete="DELETE FROM `users` WHERE userid='$cid'";
	execute($cdelete);
	execute($udelete);
}
//delete patient ends

//data retrieve from tempdoctor table starts
function tempdoctorsdata()
{
	$tdquery="SELECT * FROM tempdoctorrequests";
	$tdresults=getdata($tdquery);
	return $tdresults;
}

function leavedoctor()
{
	$tdquery="SELECT * FROM vacation";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
/*doctor equipment req*/
function doctorEquipment()
{
	$tdquery="SELECT * FROM equipment";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
/**/
function nurseShift()
{
	$tdquery="SELECT * FROM nshift";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
/**/
/**/
function nurseSalary()
{
	$tdquery="SELECT * FROM nsalaryrreq";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
/**/
function nurseEquipment()
{
	$tdquery="SELECT * FROM nequipment";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
/*----------*/
function leavenurse()
{
	$tdquery="SELECT * FROM nursevacation";
	$tdresults=getdata($tdquery);
	return $tdresults;
}


/*equipment notification*/
function equipments()
{
	$tdquery="SELECT * FROM enotification";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
//data retrieve fron tempdoctor table ends

//data retrieve from tempnurse table starts
function tempnursedata()
{
	$tdquery="SELECT * FROM tempnursereq";
	$tdresults=getdata($tdquery);
	return $tdresults;
}
//data retrieve fron tempnurse table ends

//data retrieve from doctor table starts
function doctorsdata()
{
	$dquery="SELECT * FROM doctors";
	$dresults=getdata($dquery);
	return $dresults;
}
//data retrieve fron doctor table ends

//data retrieve from patients table starts
function patientsdata()
{
	$pquery="SELECT * FROM patients";
	$presults=getdata($pquery);
	return $presults;
}
//data retrieve fron patients table ends
//data retrieve from nurse table starts
function nursesdata()
{
	$pquery="SELECT * FROM nurses";
	$presults=getdata($pquery);
	return $presults;
}
//data retrieve fron nurse table ends
//data retrieve from admin table starts
function admindata()
{
	$pquery="SELECT * FROM admin";
	$presults=getdata($pquery);
	return $presults;
}
//data retrieve fron admin table ends
function adminuser($uid)
{
	//data retrieve fron users table
	$uquery="SELECT password FROM users WHERE userid='$uid'";
	$uresults=getdata($uquery);
	return $uresults;
}
//delete tempdoctors starts
if(isset($_GET['tdeleteid']))
{
	$deleteid=$_GET['tdeleteid'];
	deletetempdoctor($deleteid);
	header("location:../view/AdminDoctorRequest.php");
}
//delete tempnurses starts
if(isset($_GET['tndel']))
{
	$deleteid=$_GET['tndel'];
	deletetempnurse($deleteid);
	header("location:../view/AdminNurseRequest.php");
}
/*delete nurse*/
function deletetempnurse($deleteid)
{
	$tddelete="DELETE FROM `tempnursereq` WHERE userid='$deleteid'";
	$tudelete="DELETE FROM `tempnusers` WHERE userid='$deleteid'";
	execute($tddelete);
	execute($tudelete);
}
//delete nurses delete ends
/*ends*/
function deletetempdoctor($deleteid)
{
	$tddelete="DELETE FROM `tempdoctorrequests` WHERE userid='$deleteid'";
	$tudelete="DELETE FROM `tempusers` WHERE userid='$deleteid'";
	execute($tddelete);
	execute($tudelete);
}
//delete tempdoctors ends

//delete patients starts
if(isset($_GET['pdeleteid']))
{
	$pdeleteid=$_GET['pdeleteid'];
	deletepatient($pdeleteid);
	header("location:../view/AdminPatientList.php");
}
function deletepatient($id)
{
	$pddelete="DELETE FROM `patients` WHERE userid='$id'";
	$udelete="DELETE FROM `users` WHERE userid='$id'";
	execute($pddelete);
	execute($udelete);
}


//delete patients ends
// delete nurse start

if(isset($_GET['ndeleteid']))
{
	$ndeleteid=$_GET['ndeleteid'];
	deletenurse($ndeleteid);
	header("location:../view/AdminNurseList.php");
}
function deletenurse($id)
{
	$ndelete="DELETE FROM `nurses` WHERE userid='$id'";
	$udelete="DELETE FROM `users` WHERE userid='$id'";
	execute($ndelete);
	execute($udelete);
}
//delete nurse end

//delete doctors starts
if(isset($_GET['ddeleteid']))
{
	$ddeleteid=$_GET['ddeleteid'];
	deletedoctor($ddeleteid);
	header("location:../view/AdminDoctorList.php");
}
function deletedoctor($id)
{
	$ddelete="DELETE FROM `doctors` WHERE userid='$id'";
	$udelete="DELETE FROM `users` WHERE userid='$id'";
	execute($ddelete);
	execute($udelete);
}
//delete doctors ends

//accept tempdoctors starts
if(isset($_GET['acceptid']))
{
	$acceptid=$_GET['acceptid'];
	accepttempdoctor($acceptid);
	deletetempdoctor($acceptid);
	header("location:../view/AdminDoctorList.php");
}

function accepttempdoctor($id)
{
	$dresutls=retrievetempdoctor($id);
	$uresults=retrievetempusers($id);
	foreach ($dresutls as $dresutl) {
		$userid=$dresutl['userid'];
		$username=$dresutl['username'];
		$gender=$dresutl['gender'];
		$email=$dresutl['email'];
		$phonenumber=$dresutl['phonenumber'];
		$dob=$dresutl['dob'];
		$divission=$dresutl['divission'];
		$district=$dresutl['district'];
		$thana=$dresutl['thana'];
		$specialty=$dresutl['specialty'];
		$degree=$dresutl['degree'];
		$bmdcregno=$dresutl['bmdcregno'];
		$description=$dresutl['description'];
	}
	foreach ($uresults as $uresult) {
		$userid=$uresult['userid'];
		$password=$uresult['password'];
		$status=$uresult['status'];
	}
	//insert into doctors table
	$dquery="INSERT INTO doctors VALUES (NULL,'$userid','$username','$gender','$email','$phonenumber','$dob','$divission','$district','$thana','$specialty','$degree','$bmdcregno','$description')";
	//insert into users table
	$uquery="INSERT INTO users VALUES (NULL,'$userid','$password','$status')";

	execute($dquery); 
	execute($uquery); 

}
/*accept nurse*/
if(isset($_GET['tnacc']))
{
	$acceptid=$_GET['tnacc'];
	accepttempnurse($acceptid);
	deletetempnurse($acceptid);
	header("location:../view/AdminNurseRequest.php");
}

function accepttempnurse($id)
{
	$dresutls=retrievetempnurse($id);
	$uresults=retrievetempnuser($id);
	foreach ($dresutls as $dresutl) {
		$userid=$dresutl['userid'];
		$username=$dresutl['username'];
		$gender=$dresutl['gender'];
		$email=$dresutl['email'];
		$phonenumber=$dresutl['phonenumber'];
		$dob=$dresutl['dob'];
		$bloodgroup=$dresutl['bloodgroup'];
		$divission=$dresutl['divission'];
		$district=$dresutl['district'];
		$thana=$dresutl['thana'];
	}
	foreach ($uresults as $uresult) {
		$userid=$uresult['userid'];
		$password=$uresult['password'];
		$status=$uresult['status'];
	}
	//insert into nurses table
	$dquery="INSERT INTO `nurses`(`id`, `userid`, `username`, `gender`, `email`, `phonenumber`, `dob`, `bloodgroup`, `divission`, `district`, `thana`) VALUES (NULL,'$userid','$username','$gender', '$email', '$phonenumber', '$dob', '$bloodgroup', '$divission', '$district', '$thana')";
	//insert into users table
	$uquery="INSERT INTO users VALUES (NULL,'$userid','$password','$status')";

	execute($dquery); 
	execute($uquery); 

}
/*ends*/

function retrievetempdoctor($id)
{
	$tdaccept="SELECT * FROM `tempdoctorrequests` WHERE userid='$id'";
	$tempdoc=getdata($tdaccept);
	return $tempdoc;
}
function retrievetempusers($id)
{
	$tuaccept="SELECT * FROM `tempusers` WHERE userid='$id'";
	$tempusers=getdata($tuaccept);
	return $tempusers;
}
//accept tempdoctors ends
function divission()
{
	$query="SELECT * from divission";
	$results=getdata($query);
	return $results;
}
//data retrieve from patient records table starts///
function patientrecords()
{
	$records="SELECT * FROM `patientrecords`";
	$results=getdata($records);
	return $results;
}
//data retrieve from patient records table ends///

/*retrive temp nurse*/
function retrievetempnurse($id)
{
	$tdaccept="SELECT * FROM `tempnursereq` WHERE userid='$id'";
	$tempdoc=getdata($tdaccept);
	return $tempdoc;
}
function retrievetempnuser($id)
{
	$tuaccept="SELECT * FROM `tempnusers` WHERE userid='$id'";
	$tempusers=getdata($tuaccept);
	return $tempusers;
}
/*ends*/


/*delete leave application*/
if (isset($_GET['lidd'])) {
	$delid=$_GET['lidd'];
	$msg = "Leave application rejected";

	leave_delete_vacation($delid);

	$notification="INSERT INTO `dnotification`VALUES (NULL,'$delid','$msg')";
	execute($notification);
	header("location:../view/AdminDoctorLeave.php");
}
/*leave application accept*/
if (isset($_GET['liad'])) {
	$delid=$_GET['liad'];
	$msg = "Leave application accepted";

	leave_delete_vacation($delid);

	$notification="INSERT INTO `dnotification`VALUES (NULL,'$delid','$msg')";
	execute($notification);
	header("location:../view/AdminDoctorLeave.php");
}


function leave_delete_vacation($id)
{
	$query="DELETE FROM vacation WHERE did='$id'";
	execute($query);
}

if (isset($_GET['rejectE'])) {
	$did = $_GET['rejectE'];

	deleteEquipment($did); 
	rejectmessage($did);
	header("location:../view/AdminDoctorEquipment.php");
}
if (isset($_GET['acceptE'])) {
	$did = $_GET['acceptE'];

	deleteEquipment($did); 
	acceptmessage($did);
	header("location:../view/AdminDoctorEquipment.php");
}

function deleteEquipment($id){
	
	$sql = "DELETE FROM `equipment` WHERE did = '$id'";
	execute($sql);
	
}
function rejectmessage($id){
	$msg = "Equipment Request Rejected";
	$sql = "INSERT INTO `dnotification`(`id`, `did`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
function acceptmessage($id){
	$msg = "Equipment Request Accepted";
	$sql = "INSERT INTO `dnotification`(`id`, `did`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
/*Nurse Equipment*/
if (isset($_GET['ndid'])) {
	$nid = $_GET['ndid'];

	delete_Equipment($nid); 
	reject_message($nid);
	header("location:../view/AdminDoctorEquipment.php");
}
if (isset($_GET['naid'])) {
	$nid = $_GET['naid'];

	delete_Equipment($nid); 
	accept_message($nid);
	header("location:../view/AdminDoctorEquipment.php");
}

function delete_Equipment($id){
	
	$sql = "DELETE FROM `nequipment` WHERE nid = '$id'";
	execute($sql);
	
}
function reject_message($id){
	$msg = "Equipment Request Rejected";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
function accept_message($id){
	$msg = "Equipment Request Accepted";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
}
/*nurse leave*/
if (isset($_GET['nld'])) {
	$nid = $_GET['nld'];

	delete_leave($nid); 
	reject__message($nid);
	header("location:../view/AdminDoctorLeave.php");
}
if (isset($_GET['nla'])) {
	$nid = $_GET['nla'];

	delete_leave($nid); 
	accept__message($nid);
	header("location:../view/AdminDoctorLeave.php");
}

function delete_leave($id){
	
	$sql = "DELETE FROM `nursevacation` WHERE nid = '$id'";
	execute($sql);
	
}
function reject__message($id){
	$msg = "Leave Application Rejected";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
function accept__message($id){
	$msg = "Leave Application Accepted";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
}
/*Nurse Salary*/
if (isset($_GET['nsr'])) {
	$nid = $_GET['nsr'];

	delete__leave($nid); 
	reject___message($nid);
	header("location:../view/NurseRequest.php");
}
if (isset($_GET['nsa'])) {
	$nid = $_GET['nsa'];

	delete__leave($nid); 
	accept___message($nid);
	header("location:../view/NurseRequest.php");
}

function delete__leave($id){
	
	$sql = "DELETE FROM `nsalaryrreq` WHERE nid = '$id'";
	execute($sql);
	
}
function reject___message($id){
	$msg = "Salary Increase Application Rejected";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
function accept___message($id){
	$msg = "Salary Increase Application Accepted";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
}
/*Nurse Shift*/
if (isset($_GET['nshr'])) {
	$nid = $_GET['nshr'];

	delete___leave($nid); 
	reject____message($nid);
	header("location:../view/NurseRequest.php");
}
if (isset($_GET['nsha'])) {
	$nid = $_GET['nsha'];

	delete___leave($nid); 
	accept____message($nid);
	header("location:../view/NurseRequest.php");
}

function delete___leave($id){
	
	$sql = "DELETE FROM `nshift` WHERE nid = '$id'";
	execute($sql);
	
}
function reject____message($id){
	$msg = "Shift Change Application Rejected";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
	
}
function accept____message($id){
	$msg = "Shift Change Application Accepted";
	$sql = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (NULL,'$id','$msg')";
	execute($sql);
}

/*admin give notice all the doctors & nurse*/
if (isset($_POST['send'])) {
	$id = $_POST['aid'];
	$msg = $_POST['field'];
	//." .....notification from admin";
	if(empty($msg))

	{
       
	}
	else{
	$sql = "INSERT INTO `dnotification`(`id`, `did`, `msg`) VALUES (Null,'$id', '$msg')";
	$sql1 = "INSERT INTO `nnotification`(`id`, `nid`, `msg`) VALUES (Null,'$id','$msg')";
	execute($sql);
	execute($sql1);	//header("location:../view/AdminNotice.php");
}
}
?>