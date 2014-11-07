<?php session_start();
/* if the user isn't logged in, don't let them view profiles */
if (!(isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1)) {
	header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Profile</title>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<?php include_once ("../header.php"); ?>
	
	<br />
	<img src="../image/no-photo-large.png" alt="User Image" title="user"
		width="200" height="200">

	<!-- Fetch and display user data -->
	<section>
		<?php
		include_once ("../views/showUser.php");
		showUser($username);
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1 && $_SESSION['userName'] == $username) {
			echo "<a href=\"\">Edit Profile</a>";
		}
		?>
	</section>
</body>
</html>