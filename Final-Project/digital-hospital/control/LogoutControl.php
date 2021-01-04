<?php
	session_start();
	session_unset();
	session_destroy();
	setcookie("name", "", time() - (86400 * 30), "/");
	header("Location:../view/Login.php");
?>