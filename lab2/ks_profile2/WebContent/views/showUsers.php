<?php
/**
 * Displays a list of all users
 * Input: an array of UserData objects
 */
function showUsers($userList) {
	foreach ( $userList as $user ) {
		$user->printUser ();
	}
}
?>