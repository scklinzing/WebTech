<?php
// Displays a user profile
function showUserProfile($profile) {
	echo "<h1>URL Nosh Member Profile</h1>";
	echo "User profile Id: $profile->getUserProfileId()<br>";
	echo "User first name: $profile->getUserProfileFirstName()<br>";
	echo "User last name:  $profile->getUserProfileLastName()<br>";
	echo "User email: $profile->getUserProfileEmail()<br>";
	echo "Date profile last modified: $profile->getUserProfileDateModified()<br>";
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>