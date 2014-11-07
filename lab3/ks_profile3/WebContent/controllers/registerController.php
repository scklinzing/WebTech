<?php
include_once(dirname(__FILE__)."/../models/Database.class.php");
include_once(dirname(__FILE__)."/../views/showUser.php");
include_once(dirname(__FILE__)."/../views/registerForm.php");
include_once(dirname(__FILE__)."/../models/UserData.class.php");
include_once(dirname(__FILE__)."/../models/UserDB.class.php");
include_once(dirname(__FILE__)."/../models/InterestListDB.class.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
	$user = new UserData();
	registerForm($user);
} else {
   $user = new UserData($_POST);
   if (!is_null(UserDB::getUserByName($user->getUsername())))
   	  $user->setError('username', 'User already exists, choose another name');
   $id = 0;
   if ($user->getErrorCount() == 0)   
        $id = UserDB::addUser($user);
   if ($id != 0) { // if successfully added, show the user
        showUser(UserDB::getUserByID($id)); // need to fix what comes back
    } else {
    	registerForm($user);	
    }
} 
?>