<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/registerForm.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");
include_once (dirname ( __FILE__ ) . "/../models/InterestListDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] != "POST") {
	$user = UserDB::getUserByName ( $_SESSION ['userName'] );
	registerForm ( $user );
} else {
	/* check to see if the image is an actual image */
	if ($_FILES ["userImage"] ["size"] > 0) { // if user chose a new user image
		$check = getimagesize ( $_FILES ["userImage"] ["tmp_name"] );
		if ($check == false) { // file not an image
			throw new Exception ( "File is not an image." );
		} else {
			$IMAGE = $_FILES;
			echo "there is an image update";
		}
	} else { // if user did not choose a new user image
		$IMAGE = NULL;
	}
	
	
	//$user = UserDB::getUserByName ( $_SESSION ['userName'] );
	$_POST["username"] = $_SESSION ['userName'];
	//$_POST["password"] = $user->getPasswordHash();
	$_POST["password"] = $_POST["updatePass"];
	$_POST["userPasswordRetyped"] = $user->getPasswordHash();
	$user = new UserData ( $_POST );
	
	if ($user->getErrorCount() == 0) {
		$actualUser = userDB::getUserByName ( $user->getUsername() );
		if (is_null ( $actualUser )) { // bad username
			$user->setError ( 'username', 'Invalid user name' );
			registerForm ( $user );
		} elseif (! userDB::authenticateUser ( $user )) { // bad password
			$user->setError ( 'password', 'Invalid current password' );
			registerForm ( $user );
		} else { // upload photo
			
			$id = UserDB::updateUser ( $_SESSION ['userName'], $user, $IMAGE );
			if ($id != 0) { // if successfully updated, show the user
				// redirect the user to their profile page
				header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] );
				//echo "<br>Successfully updated profile<br>";
			}
		}
	
	
	} else {
		registerForm ( $user );
	}
}
?>