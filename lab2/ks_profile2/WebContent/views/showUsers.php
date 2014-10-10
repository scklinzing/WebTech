<?php
/**
 * Displays a list of all users
 * Input: an array of UserData objects
 */
function showUsers($userList) {
	echo "<h1>Here are all our current members!</h1>";
	foreach ( $userList as $user ) {
		$user->printUser ();
	}
}
?>