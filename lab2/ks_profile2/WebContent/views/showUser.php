<?php
/**
 * Displays the information about the user passed through
 * Input: a username
 */
include_once ("../models/UserData.class.php");
include_once ("../models/UserDB.class.php");
include_once ("../models/Database.class.php");
function showUser($username) {
	$userID = UserDB::getUserID($username);
	$user = UserDB::getUserByID ( $userID );
	$user->printUser ();
	echo "<hr><br>";
}
?>