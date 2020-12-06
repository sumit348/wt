<!DOCTYPE html>
<html>
<head>
	<title>My Form</title>
</head>
<body>

	<?php
	  	$idError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["id"])) {
				  $idError = "ID is required";
			}
			else {
				echo "ID is: " . $_REQUEST["id"];
			}
		}
        echo "<br>";
        $nameError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["name"])) {
				  $nameError = "Name is required";
			}
			else {
				echo "Name is: " . $_REQUEST["name"];
			}
		}
        echo "<br>";
        $genderError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["gender"])) {
				  $gernderError = "Gender is required";
			}
			else {
				echo "Gender is: " . $_REQUEST["gender"];
			}
		}
        
        echo "<br>";
        $emailError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["email"])) {
				  $emailError = "Email is required";
			}
			else {
				echo "Email is: " . $_REQUEST["email"];
			}
		}
        
        echo "<br>";
        $addressError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["address"])) {
				  $addressError = "Address is required";
			}
			else {
				echo "Address is: " . $_REQUEST["address"];
			}
		}
    
        echo "<br>";
        $cityError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["city"])) {
				  $cityError = "City is required";
			}
			else {
				echo "City is: " . $_REQUEST["city"];
			}
		}
    
        echo "<br>";
        $stateError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["state"])) {
				  $stateError = "State is required";
			}
			else {
				echo "State is: " . $_REQUEST["state"];
			}
		}
    
        echo "<br>";
        $countryError = "";
	  	if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_REQUEST["country"])) {
				  $countryError = "country is required";
			}
			else {
				echo "Country is: " . $_REQUEST["country"];
			}
		}
        echo "<br>";
        
	?>
	<br>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	Student Id <br/> 
    <input type="text" name="id" required>
	<br /><br>
	<span><?php echo $idError; ?></span>
        
	Student Name <br/>
    <input type="text" name="name" required>
	<br /><br />
    <span><?php echo $nameError; ?></span>

	Gender <br/>
    <input type="checkbox" name="gender" value="male" required>Male
    <br/>
	<input type="checkbox" name="gender" value="female" required>Female
    <br/><br/>
    <span><?php echo $genderError; ?></span>
    
        
    Student Email <br/>
    <input type="text" name="email" value="@" required>
	<br /><br />
    <span><?php echo $emailError; ?></span>
    
    Address  <br/>
    <input type="text" name="address" required>
	<br /><br>       
    Street Address
    <br />
    <input type="text" name="address2">
	<br />
    Address line 2 
    <span><?php echo $addressError; ?></span><br />
        
    <input type="text" name="city" required>
    <span><?php echo $cityError; ?></span>
    <input type="text" name="state" required >
    <span><?php echo $stateError; ?></span>
    <br/>
    <span style="margin-right:150px">City</span>
    <span>State/Province/Region</span>
    <br/>
        
    <input type="text" name="zip" >
    <select name="country">
    <option value="Bangladesh">Bangladesh</option>
    <option value="India">Spain</option>
    <option value="Pakisthan">USA</option>
    <option value="Nepal">England</option>
    </select>
    <span><?php echo $countryError; ?></span>
    <br/>
    <span style="margin-right:75px">Zip/Postal Code</span>
    <span>Country</span>
	
	<br /><br />
	<input type="submit" value="Save Form">
	</form>
</body>
</html>