<?php
session_start();
if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1) {
	$_SESSION ['userLoginStatus'] = 0;
	session_unset();
	session_destroy();
	// redirect to the homepage
	header("location: ../index.php");
	exit(); // close any remaining open php code
}
?>