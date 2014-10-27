<?php

include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showUser.php");
include_once(dirname(__FILE__)."/../views/registerForm.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	$user = new userData();
	registerForm($user);
} else {
   $user = new UserData($_POST);
   if (!is_null(userDB::getUserByName($user->getUserName())))
   	  $user->setError('userName', 'User already exists, choose another name');
   $id = 0;
   if ($user->getErrorCount() == 0)   
        $id = userDB::addUser($user);
   if ($id != 0) { // if successfully added, show the user
        showUser(userDB::getUserById($id)); // need to fix what comes back
    } else {
    	registerForm($user);	
    }
} 

?>