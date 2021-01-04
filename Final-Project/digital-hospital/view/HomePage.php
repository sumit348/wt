<html>
	<head><title>Home Page</title>
			<link rel="stylesheet"type="text/css"href="CSS/homepage.css">
			<link rel="stylesheet" href="CSS/faq.css">

	</head>
	<body>
		<div class="btngrp">
			<label class="h1">Welcome to Digital hospital</label>
			<button type="button"name="home"class="button"onclick="window.location='HomePage.php'">Home
			</button>
			<button type="button"name="home"class="button"onclick="window.location='Login.php'">Login</button>
			
			<div class="dropdown">
				<button class="dropbtn">Sign up 
				</button>
				<div class="dropdown-content">
				  <a href="DoctorRegistration.php">Doctor</a>
				  <a href="PatientRegistration.php">Patient</a>
				  <a href="NurseRegistration.php">Nurse</a>
				</div>
			</div> 
		</div>
		<div class="home">
			<h2>Hospital For Doctor & Patient</h2>
			<div class="maindiv"></div>
			<div class="maindiv2"></div>
			<div class="maindiv3">
				<p class="p">
					Call us at +8801234567890
					Website: www.digitalhospital.com
					<a href="https://www.facebook.com/onlineclinic.helth/">visit our facebook page</a>
					<a href="https://www.mhealth.org/Care/Conditions/COVID-19"> <br>->CORONAVIRUS (COVID-19)</a> The information you need to know
				</p>
			</div>
		</div>
		<?php include 'FAQ.php'; ?>
	</body>
</html>