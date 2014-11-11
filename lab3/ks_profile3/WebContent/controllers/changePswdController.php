<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/changePassword.php");
include_once (dirname ( __FILE__ ) . "/../models/ChangePswdData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	$user = new ChangePswdData ( $_POST ); 
	
	if ($user->getErrorCount() == 0) {
		$actualUser = userDB::getUserByName ( $user->getUsername() );
		if (is_null ( $actualUser )) {
			$user->setError ( 'username', 'Invalid user name' );
			changePassword ( $user );
		} elseif (! userDB::authenticateUser ( $user )) {
			$user->setError ( 'password', 'Invalid current password' );
			changePassword ( $user );
		} else { // change the passwords here
			if ($user->getOldPassword() != $user->getNewPassword()) {
				//
			}
			/* redirect the user to their profile page */
			header("location: ../views/userProfile.php?username=".$_SESSION ['userName']);
		}
	} else {
		changePassword ( $user );
	}
} else { // Initial link
	$user = new ChangePswdData ();
	changePassword ( $user );
}

?>