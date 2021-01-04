<?php
	include 'CSS/bootstrap.php';
	include '../control/DoctorsControls.php';
	//session starts
	session_start();
	if(isset($_SESSION['did']))
	{
		if (time()-$_SESSION['last_time']>1800) //30 min inactive thakle logout automatic
		{
			header("Location:../control/LogoutControl.php");
		}
		else
		{
			$_SESSION['last_time']=time();
		}
	}
	else
	{
		header("Location:Login.php");
	}
	//session ends
	$id=0;
	$patients=patientlist($_SESSION['did']);
	$testclinics=testclinics();
	$diseases=diseases();
?>

<html>
	<head>
		<title>
			Doctor Salary History
		</title>
		<link rel="stylesheet"type="text/css"href="CSS/doctorcss.css">
		<script>
			
			//search here//
			function search() 
			{
				var search_input = document.getElementById('search_input').value.toUpperCase();
				var table = document.getElementById('salary-search');
				var tr = table.getElementsByTagName('tr');
				for(var i=0; i<tr.length; i++)
				{
					var td = tr[i].getElementsByTagName('td')[1];
					if (td) 
					{
						var textvalue = td.textContent || td.innerHTML;
						if (textvalue.toUpperCase().indexOf(search_input) > -1) 
						{
							tr[i].style.display = "";
						}
						else
						{
							tr[i].style.display = "none";
						}
					}
				}
			}
			//search here ends//
		</script>
	</head>
	<body>
		<button class="button"onclick="window.location='../control/LogoutControl.php'">Logout</button>
		<button type="button"name="home"class="button"onclick="window.location='DoctorHomePage.php'">Home Page</button>
		<div class="div1">
			<h2>Doctor Salary History</h2>
		</div>

		<!--search bar and table statrs-->
		<div class="search">
			<div class="input-group mb-3">
				<input type="text" class="form-control" placeholder="search month..." id="search_input" onkeyup="search()">
			</div>
		</div>
		<div class="table">
			<table class="table table-hover table-bordered " id="salary-search">
			  <thead>
			    <tr class="thead-dark">
			      <th scope="col">SI#</th>
			      <th scope="col">Date</th>
			      <th scope="col">Year</th>
			      <th scope="col">Salary</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<tr>
			  		<td>1</td>
			  		<td>Jan</td>
			  		<td>2020</td>
			  		<td>1000</td>
			  		<td>Not Applicable</td>
			  	</tr>
			  	<tr>
			  		<td>2</td>
			  		<td>Feb</td>
			  		<td>2020</td>
			  		<td>1000</td>
			  		<td>Not Applicable</td>
			  	</tr>
			  	<tr>
			  		<td>3</td>
			  		<td>Mar</td>
			  		<td>2020</td>
			  		<td>1000</td>
			  		<td>Not Applicable</td>
			  	</tr>
			  	<tr>
			  		<td>4</td>
			  		<td>Apr</td>
			  		<td>2021</td>
			  		<td>1000</td>
			  		<td>Not Applicable</td>
			  	</tr>
			  	<tr>
			  		<td>5</td>
			  		<td>May</td>
			  		<td>2021</td>
			  		<td>1000</td>
			  		<td>Not Applicable</td>
			  	</tr>
				    
			  </tbody>
			</table>
		</div>
		<!--search bar and table ends-->


	</body>
</html>