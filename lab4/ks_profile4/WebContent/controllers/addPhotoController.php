<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
/**
 * Add a photo to a user's gallery
 */
if (($_SERVER ["REQUEST_METHOD"] == "POST") && ($_FILES["addPhoto"]["size"] > 0)) {
	echo '<br>';
	print_r($_FILES);
	echo '<br>';
	print_r($_POST);
	echo '<br>';
	
	// get the username 
	$username = $_POST['username'];
	
	// check to see if the image is an actual image
	$check = getimagesize ( $_FILES ["addPhoto"] ["tmp_name"] );
	if ($check == false) { // file not an image
		throw new Exception ( "File is not an image." );
	} else { // set $IMAGES
		$IMAGE = $_FILES;
	}
	
	$userID = UserDB::getUserID($username);
	echo 'UserID: '.$userID.'<br>';
	
	// attempt to add the image to user gallery
	if (($userID != 0) && (UserDB::addPhoto($userID, $IMAGE) != 0)) {
		// redirect the user to their profile page
		//echo "Successfully added!<br>";
		header ( "location: ../views/userProfile.php?username=" . $_POST ['username'] );
	} else {
		throw new Exception ( "Error adding new image to gallery." );
	}
} else { // user did not select a file
	header ( "location: ../views/userProfile.php?username=" . $_POST['username'] );
}
?>