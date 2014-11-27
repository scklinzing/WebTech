<?php
/**
 * Displays a user profile image
 */
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

function showUserImage($username, $size) {
	$userID = UserDB::getUserID($username);
	$image = UserDB::getImageByUserId ( $userID );
	/* check we have a single image and type */
	if (sizeof ( $image ) == 2) {
		if ($size == "small") { // print 50x50 icon
			echo '<img src="data:image/'.$image['image_type'].';base64,'.base64_encode( $image['image'] ).'" 
					width="50" height="50" alt="[User Image]" title="'.$username.'"/>';
		} else if ($size == "large") { // print 200x200 icon
			echo '<img src="data:image/'.$image['image_type'].';base64,'.base64_encode( $image['image'] ).'" 
					width="200" height="200" alt="[User Image]" title="'.$username.'"/>';
		} else { // size was not specified! ERROR!
			throw new Exception ( "showUserImage: Image size not specified." );
		}
	} else {
		throw new Exception ( "showUserImage: Out of bounds Error" );
	}
}
?>