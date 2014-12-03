<?php
session_start ();
/* if the user isn't logged in, don't let them view profiles */
if (! (isset ( $_SESSION ['userLoginStatus'] ) && $_SESSION ['userLoginStatus'] == 1)) {
	header ( "location: ../index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="../jquery/jquery-2.1.1.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<title>User Profile</title>
</head>

<body>
	<!-- This must be declared early so we can put a link in the nav bar to the user's profile -->
	<?php $username = $_GET ['username']; ?>
	<?php include_once (dirname ( __FILE__ ) . "/../header.php"); ?>
	
	<!-- USER INFORMATION -->
	<div class="container">
		<p>&nbsp;</p>
		<!-- Fetch and display user data -->
		<?php
		include_once (dirname ( __FILE__ ) . "/showUser.php");
		include_once (dirname ( __FILE__ ) . "/showUserImage.php");
		include_once (dirname ( __FILE__ ) . "/modal.php");
		include_once (dirname ( __FILE__ ) . "/showGallery.php");
		include_once (dirname ( __FILE__ ) . "/tempGallery.php"); // DELETE LATER!!
		/* print out their user profile picture */
		?>
		<div class="row">
			<div class="col-lg-3">
				<?php showUserImage ( $username, "large" );?>
			</div>
			<div class="col-lg-3">
				<?php
				/* show the user information */
				showUser ( $username, "userProfile.php?username=" );
				if (isset ( $_SESSION ['userLoginStatus'] ) && $_SESSION ['userLoginStatus'] == 1 && $_SESSION ['userName'] == $username) {
					echo '<a href="../controllers/editProfileController.php" class="btn btn-default" role="button">Edit Profile</a>';
				}
				?>
			</div>
		</div>
	</div>

	<?php
		showGallery($username); // show user gallery
		// if the user is on their profile page, allow gallery upload
		if (isset ( $_SESSION ['userLoginStatus'] ) && $_SESSION ['userLoginStatus'] == 1 && $_SESSION ['userName'] == $username) {
			include_once (dirname ( __FILE__ ) . "/addPhoto.php");
			addPhoto($username); // add a new photo
		}
		modal(); // include modal code
	?>

	<footer>
		<p>-x-</p>
		<p>
			<i>Rat Chat Website created by Shelley Klinzing</i>
		</p>
	</footer>
</body>
</html>