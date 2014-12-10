<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/registerForm.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/InterestListDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] != "POST") {
	$user = new UserData ();
	registerForm ( $user );
} else {
	/* check to see if the image is an actual image */
	if (isset ( $_POST ["submit"] )) {
		$check = getimagesize ( $_FILES ["userImage"] ["tmp_name"] );
		if ($check == false) { // file not an image
			throw new Exception ( "File is not an image." );
		} else {
			$IMAGE = $_FILES;
		}
	}
	
	/* create a new user */
	$user = new UserData ( $_POST );
	if (! is_null ( UserDB::getUserByName ( $user->getUsername () ) )) // username already exists
		$user->setError ( 'username', 'User already exists, choose another name' );
	$id = 0;
	if ($user->getErrorCount () == 0) { // if no errors, attempt to add user and image to DB
		$id = UserDB::addUser ( $user, $IMAGE );
	}
	if ($id != 0) { // if successfully added, show the user profile page
		$user = UserDB::getUserByID ( $id ); // get new user
		$_SESSION ['userName'] = $user->getUsername (); // set session
		$_SESSION ['userLoginStatus'] = 1;
		header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] ); // show profile page
	} else {
		registerForm ( $user );
	}
}
?>