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
	$user = UserDB::getUserByName ( $_SESSION ['userName'] );
	$_POST["password"] = $user->getPasswordHash();
	$_POST["userPasswordRetyped"] = $user->getPasswordHash();
	$user = new UserData ( $_POST );
	if ($user->getErrorCount () == 0)
		$id = UserDB::updateUser ( $_SESSION ['userName'], $user );
	if ($id != 0) { // if successfully updated, show the user
		/* redirect the user to their profile page */
		header ( "location: ../views/userProfile.php?username=" . $_SESSION ['userName'] );
	} else {
		registerForm ( $user );
	}
}
?>