<?php
/**
 * Displays the information about the user passed through
 * Input: a username
 */
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
function showUser($user) {
	/* $userID = UserDB::getUserID($username);
	$user = UserDB::getUserByID ( $userID );
	$user->printUser ();
	echo "<hr><br>"; */

	echo "<h1>Rat Chat Member</h1>";
	echo "User Id: ".$user->getUserID()."<br>";
	echo "User name: ".$user->getUsername()."<br>";
	echo "Date created: ".$user->getuserDateCreated()."<br>";
	echo "Is authenticated: ".$user->getIsAuthenticated()."<br>";
	echo '<h3><a href="../index.php">Back to home</a>';
}
?>