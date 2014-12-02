<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/userProfile.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../views/addPhoto.php");

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	echo '<br>';
	print_r($_FILES);
	echo '<br>';
	/* check to see if the image is an actual image */
	if ($_FILES ["addPhoto"] ["size"] > 0) { // if user chose a new user image
		$check = getimagesize ( $_FILES ["addPhoto"] ["tmp_name"] );
		if ($check == false) { // file not an image
			throw new Exception ( "File is not an image." );
		} else {
			$IMAGE = $_FILES;
		}
	} else {
		/*
		 * User did not choose a new image to add to the gallery.
		 * Return to their profile page.
		 */
		header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] );
	}
	
	$user = UserDB::getUserByName ( $_SESSION ['userName'] ); // get user info
	
	/* attempt to add the image to user gallery */
	if ($user->getErrorCount () == 0)
		$result = UserDB::addPhoto($user, $IMAGE);
	if ($result != 0) { // if successfully added
		// redirect the user to their profile page
		header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] );
	} else {
		throw new Exception ( "Error adding new image to gallery." );
	}
} else {
	addPhoto();
}
?>