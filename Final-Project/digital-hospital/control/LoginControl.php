<?php
	require_once ('../model/db_connect.php');
	session_start();
	if(isset($_POST['login']))
	{
		if(empty($_POST['uid']) || empty($_POST['pass']))
		{
			header("location:../view/Login.php?empty= Please fill in the blanks");
		}
		else
		{
			$uid=$_POST['uid'];
			$pass=$_POST['pass'];
			//data from users table
			$query="SELECT * FROM users WHERE userid='$uid'";
			$datadb=getdata($query);
			if (count($datadb)) 
			{
				foreach ($datadb as $key => $value) 
				{
					$passdb=$value["password"];
					$status=$value["status"];
					if(password_verify($pass, $passdb))
					{
						if ($status==1) 
						{
							$_SESSION['aid'] = $uid;
							$_SESSION['last_time']=time();
							header("location:../view/AdminHomePage.php");
						}
						elseif($status==2)
						{
							$_SESSION['did'] = $uid;
							$_SESSION['last_time']=time();
							header("location:../view/DoctorHomePage.php");
						}
						elseif($status==3)
						{
							$_SESSION['pid'] = $uid;
							$_SESSION['last_time']=time();
							header("location:../view/PatientHomePage.php");
							/*header("location:../view/Login.php?pass=<?php echo $pass?>");*/
						}
						elseif($status==5)
						{
							$_SESSION['nid'] = $uid;
							$_SESSION['last_time']=time();
							header("location:../view/NurseHomePage.php");
							/*header("location:../view/Login.php?pass=<?php echo $pass?>");*/
						}
					}
					else
					{
						header("location:../view/Login.php?empty=Password is wrong !");
						/*header("location:../view/Login.php?empty=<?php echo $passdb?>");*/
					}
				}
			}
			else
			{
				header("location:../view/Login.php?empty=User does not exist!");
			}
			
		}
	} 
?>