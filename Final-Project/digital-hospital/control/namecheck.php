 <?php
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="digitalhospital";

	//echo $id;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username FROM admin WHERE userid= '$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$cookie_value=$row['username'];
setcookie("name", $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$conn->close();
?> 