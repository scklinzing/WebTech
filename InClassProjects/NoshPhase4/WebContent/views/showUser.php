<?php
// Displays a user Input: an array of UserData objects
function showUser($user) {
	echo "<h1>URL Nosh Member</h1>";
	echo "User Id: ".$user->getUserId()."<br>";
	echo "User name: ".$user->getUserName()."<br>";
	echo "Date created: ".$user->getuserDateCreated()."<br>";
	echo "Is authenticated: ".$user->getIsAuthenticated()."<br>";
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>