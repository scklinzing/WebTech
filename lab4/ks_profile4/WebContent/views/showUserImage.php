<?php
/**
 * Displays a user profile image
 */
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

function showUserImage($username) {
	$userID = UserDB::getUserID($username);
	$image = UserDB::getImageByUserId ( $userID );
	/* check we have a single image and type */
	if (sizeof ( $image ) == 2) {
		/* set the headers and display the image */
		header ( "Content-type: " . $image ['image_type'] );
		/* output the image */
		echo $image ['image'];
	} else {
		throw new Exception ( "Out of bounds Error" );
	}
}
?>