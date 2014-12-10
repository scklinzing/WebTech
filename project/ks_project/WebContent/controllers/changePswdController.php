<?php
include_once (dirname ( __FILE__ ) . "/../models/Database.class.php");
include_once (dirname ( __FILE__ ) . "/../views/showUser.php");
include_once (dirname ( __FILE__ ) . "/../views/changePassword.php");
include_once (dirname ( __FILE__ ) . "/../models/ChangePswdData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserData.class.php");
include_once (dirname ( __FILE__ ) . "/../models/UserDB.class.php");

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	$_POST["username"] = $_SESSION ['userName'];
	$user = new ChangePswdData ( $_POST ); 
	//print_r($_POST);
	echo "<br>";
	print_r($user->getErrors());
	if ($user->getErrorCount() == 0) {
		$actualUser = userDB::getUserByName ( $user->getUsername() );
		if (is_null ( $actualUser )) {
			echo "null user<br>";
			$user->setError ( 'username', 'Invalid user name' );
			changePassword ( $user );
		} elseif (! userDB::authenticateUser ( $user )) {
			echo "invalid pass<br>";
			$user->setError ( 'password', 'Invalid current password' );
			changePassword ( $user );
		} else { // change the passwords here
			echo "made it to else<br>";
			if ($user->getPassword() != $user->getNewPassword()) {
				$id = UserDB::updateUserPassword($user->getUsername(), $user);
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