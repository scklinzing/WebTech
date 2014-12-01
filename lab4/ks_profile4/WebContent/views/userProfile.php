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
	<style>footer {text-align:center;}</style>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<?php include_once(dirname(__FILE__)."/../header.php"); ?>
	
	<div class="container">
		<p>&nbsp;</p>
		<!-- Fetch and display user data -->
		<?php
		include_once (dirname ( __FILE__ ) . "/showUser.php");
		include_once (dirname ( __FILE__ ) . "/showUserImage.php");
		/* print out their user profile picture */
		showUserImage($username, "large");
		echo "<br>";
		/* show the user information */
		showUser($username, "userProfile.php?username=");
		if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] == 1 && $_SESSION['userName'] == $username) {
			//echo "<a href=\"../controllers/editProfileController.php\" class=\"btn btn-default\" role=\"button\">Edit Profile</a>";
			echo '<a href="../controllers/editProfileController.php" class="btn btn-default" role="button">Edit Profile</a>';
		}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>
</html>