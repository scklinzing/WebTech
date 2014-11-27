<?php session_start();
/* if the user isn't logged in, don't let them view profiles */
if (!(isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1)) {
	header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>User Profile</title>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	
	<div class="container">
		<p>&nbsp;</p>
		<img src="../image/no-photo-large.png" alt="User Image" title="user"
			width="200" height="200">
	
		<!-- Fetch and display user data -->
		<?php
		include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
		include_once (dirname ( __FILE__ ) . "/../views/showUserImage.php");
		showUserImage($username);
		echo "<br>";
		showUser($username);
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1 && $_SESSION['userName'] == $username) {
			echo "<a href=\"../controllers/editProfileController.php\" class=\"btn btn-default\" role=\"button\">Edit Profile</a>";
		}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>