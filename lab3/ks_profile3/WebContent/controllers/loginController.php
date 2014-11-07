<?php
session_start ();
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/loginForm.php");
include_once (dirname ( __FILE__ ) . "/../models/UserLoginData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	$user = new UserLoginData ( $_POST ); // What if already logged in?
	
	if ($user->getErrorCount() == 0) {
		$actualUser = userDB::getUserByName ( $user->getUsername() );
		if (is_null ( $actualUser )) {
			$user->setError ( 'username', 'Invalid user name' );
			loginForm ( $user );
		} elseif (! userDB::authenticateUser ( $user )) {
			$user->setError ( 'password', 'Invalid password' );
			loginForm ( $user );
		} else { // Add sessions here
			$_SESSION ['userName'] = $user->getUsername ();
			$_SESSION ['userLoginStatus'] = 1;
			/* redirect the user to their profile page */
			header("location: ../views/userProfile.php?username=".$user->getUsername());
		}
	} else {
		loginForm ( $user );
	}
} else { // Initial link
	$user = new userData ();
	loginForm ( $user );
}

?>