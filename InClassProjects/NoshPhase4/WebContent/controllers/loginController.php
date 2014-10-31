<?php
session_start();
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showUser.php");
include_once(dirname(__FILE__)."/../views/loginForm.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $user = new UserData($_POST);  // What if already logged in?
   if ($user->getErrorCount() == 0) {  
        $actualUser = userDB::getUserByName($user->getUserName());
        if (is_null($actualUser)) {
        	$user->setError('userName', 'Invalid user name');
        	loginForm($user);
        } elseif (!userDB::authenticateUser($user)) {
        	$user->setError('userPassword', 'Invalid password');
        	loginForm($user);
        } else	// Add sessions here
        	$_SESSION ['userName'] = $user->getUserName();
        	$_SESSION ['userLoginStatus'] = 1;
            showUser($user);
    } else {
    	loginForm($user);	
    }
} else { // Initial link
	$user = new userData();
	loginForm($user);
}

?>